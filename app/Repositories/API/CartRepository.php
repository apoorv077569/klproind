<?php

namespace App\Repositories\API;

use Exception;
use App\Models\Cart;
use App\Models\Service;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;
use App\Models\ServicePackage;
use App\Http\Resources\CartResource;
use Prettus\Repository\Eloquent\BaseRepository;

class CartRepository extends BaseRepository
{
    use \App\Http\Traits\CheckoutTrait;

    public function model()
    {
        return Service::class;
    }

    private function getCartTotalSummary($cartItems)
    {
        $totalSummary = null;
        if ($cartItems->isNotEmpty()) {
            $services = [];
            $servicePackages = [];

            foreach ($cartItems as $item) {
                if ($item->is_package) {
                    $rawServices = $item->package_services ?? [];
                    // Map frontend format (id) → checkout format (service_id) with required fields
                    $mappedServices = array_map(function ($s) {
                        $serviceId = $s['service_id'] ?? $s['id'] ?? null;
                        return [
                            'service_id'          => $serviceId,
                            'required_servicemen'  => $s['required_servicemen'] ?? Helpers::getTotalRequireServicemenByServiceId($serviceId) ?? 1,
                            'address_id'          => $s['primary_address']['id'] ?? null,
                            'type'                => $s['type'] ?? 'fixed',
                            'serviceman_id'       => [],
                            'additional_services' => $s['selectedAdditionalServices'] ?? [],
                            'date_time'           => $s['serviceDate'] ?? null,
                        ];
                    }, $rawServices);

                    $servicePackages[] = [
                        'service_package_id' => $item->service_package_id,
                        'services'           => $mappedServices,
                    ];
                } else {
                    $additionalServices = is_string($item->additional_services) ? json_decode($item->additional_services, true) : ($item->additional_services ?? []);
                    $scheduledDatesJson = is_string($item->scheduled_dates_json) ? json_decode($item->scheduled_dates_json, true) : ($item->scheduled_dates_json ?? []);

                    // required_servicemen: fallback to DB service value, then to 1
                    $requiredServicemen = $item->required_servicemen
                        ?? Helpers::getTotalRequireServicemenByServiceId($item->service_id)
                        ?? 1;

                    $services[] = [
                        'service_id' => $item->service_id,
                        'discount' => $item->discount,
                        'discount_type' => $item->discount_type,
                        'required_servicemen' => (int) $requiredServicemen,
                        'address_id' => $item->address_id,
                        'type' => $item->service_type ?? 'fixed',
                        'serviceman_id' => [],
                        'additional_services' => $additionalServices,
                        'date_time' => $item->date_time ? \Carbon\Carbon::parse($item->date_time)->format('d-M-Y,h:i a') : null,
                        'is_scheduled_booking' => !empty($item->schedule_start_date),
                        'booking_frequency' => $item->booking_frequency,
                        'schedule_start_date' => $item->schedule_start_date,
                        'schedule_time' => $item->schedule_time,
                        'scheduled_dates_json' => $scheduledDatesJson,
                        'scheduled_services_count' => count((array) $scheduledDatesJson),
                    ];
                }
            }

            $calcRequest = new \Illuminate\Http\Request();
            $calcRequest->merge([
                'consumer_id' => Helpers::getCurrentUserId(),
                'services' => $services,
                'service_packages' => $servicePackages,
                'service_package' => $servicePackages,
            ]);

            try {
                $costs = $this->calculateCosts($calcRequest);
                $totalSummary = $costs['total'] ?? null;
            } catch (\Exception $e) {
                // Return null silently - total calculation failed
                $totalSummary = null;
            }
        }
        return $totalSummary;
    }

    public function index($request)
    {
        $cartItems = Cart::where('customer_id', Helpers::getCurrentUserId())->with(['service', 'servicePackage', 'address', 'servicemen'])->get();
        return CartResource::collection($cartItems)->additional(['total' => $this->getCartTotalSummary($cartItems)]);
    }

    public function show($id)
    {
        try {
            $userId = Helpers::getCurrentUserId();
            $cart = Cart::where('customer_id', $userId)
                ->with(['service', 'servicePackage', 'address', 'servicemen'])
                ->findOrFail($id);

            $cartItems = collect([$cart]);

            return response()->json([
                'success' => true,
                'data' => (new CartResource($cart))->resolve(),
                'total' => $this->getCartTotalSummary($cartItems)
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('Cart item not found')
            ], 404);
        }
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $userId = $request->consumer_id ?? Helpers::getCurrentUserId();
            $cartData = $request->cart_data;

            // Clear old cart to sync with new data
            // Cart::where('customer_id', $userId)->delete();

            foreach ($cartData as $item) {
                $isPackage = filter_var($item['isPackage'], FILTER_VALIDATE_BOOLEAN);

                if ($isPackage) {
                    $packageData = $item['servicePackageList'] ?? null;
                    if ($packageData) {
                        // Update existing package cart item or create new one
                        Cart::updateOrCreate(
                            [
                                'customer_id' => $userId,
                                'is_package' => true,
                                'service_package_id' => $packageData['id'],
                            ],
                            [
                                'package_services' => $packageData['services'] ?? null,
                            ]
                        );
                    }
                } else {
                    $serviceData = $item['serviceList'] ?? null;
                    if ($serviceData) {
                        // Update existing service cart item or create new one
                        $cart = Cart::updateOrCreate(
                            [
                                'customer_id' => $userId,
                                'is_package' => false,
                                'service_id' => $serviceData['id'],
                            ],
                            [
                                'service_type' => $serviceData['type'] ?? 'fixed',
                                'date_time' => isset($serviceData['serviceDate']) ? \Carbon\Carbon::parse($serviceData['serviceDate']) : null,
                                'additional_services' => $serviceData['selectedAdditionalServices'] ?? null,
                                'booking_frequency' => $serviceData['bookingFrequency'] ?? null,
                                'schedule_start_date' => $serviceData['scheduleStartDate'] ?? null,
                                'schedule_time' => $serviceData['scheduleTime'] ?? null,
                                'scheduled_dates_json' => $serviceData['scheduledDatesJson'] ?? null,
                                'required_servicemen' => $serviceData['required_servicemen'] ?? $serviceData['selectedRequiredServiceMan'] ?? 1,
                                'address_id' => $serviceData['primary_address']['id'] ?? null,
                                'custom_message' => $serviceData['selectedServiceNote'] ?? null,
                                'select_serviceman_type' => $serviceData['selectServiceManType'] ?? null,
                                'select_date_time_option' => $serviceData['selectDateTimeOption'] ?? null,
                                'selected_date_time_format' => $serviceData['selectedDateTimeFormat'] ?? null,
                                'taxes' => $serviceData['taxes'] ?? null,
                                'discount' => $serviceData['discount'] ?? 0,
                                'discount_type' => $serviceData['discount_type'] ?? 'percentage',
                            ]
                        );

                        if (isset($serviceData['selectedServiceMan']) && is_array($serviceData['selectedServiceMan'])) {
                            $smIds = collect($serviceData['selectedServiceMan'])->pluck('id')->toArray();
                            $cart->servicemen()->sync($smIds);
                        }
                    }
                }
            }

            DB::commit();

            $cartItems = Cart::where('customer_id', $userId)->with(['service', 'servicePackage', 'address', 'servicemen'])->get();
            return response()->json([
                'success' => true,
                'message' => __('Cart updated successfully'),
                'data' => CartResource::collection($cartItems)->resolve(),
                'total' => $this->getCartTotalSummary($cartItems)
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $userId = Helpers::getCurrentUserId();
            $cart = Cart::where('customer_id', $userId)->findOrFail($id);

            $servicePackageList = $request->input('servicePackageList');
            $serviceList = $request->input('serviceList');

            if ($request->has('cart_data') && is_array($request->cart_data) && count($request->cart_data) > 0) {
                $servicePackageList = $request->cart_data[0]['servicePackageList'] ?? $servicePackageList;
                $serviceList = $request->cart_data[0]['serviceList'] ?? $serviceList;
            }

            if ($cart->is_package) {
                if ($servicePackageList) {
                    $packageData = $servicePackageList;
                    $cart->update([
                        'package_services' => $packageData['services'] ?? $cart->package_services,
                    ]);
                }
            } else {
                if ($serviceList) {
                    $serviceData = $serviceList;
                    $cart->update([
                        'date_time' => isset($serviceData['serviceDate']) ? \Carbon\Carbon::parse($serviceData['serviceDate']) : $cart->date_time,
                        'additional_services' => $serviceData['selectedAdditionalServices'] ?? $cart->additional_services,
                        'booking_frequency' => $serviceData['bookingFrequency'] ?? $cart->booking_frequency,
                        'schedule_start_date' => $serviceData['scheduleStartDate'] ?? $cart->schedule_start_date,
                        'schedule_time' => $serviceData['scheduleTime'] ?? $cart->schedule_time,
                        'scheduled_dates_json' => $serviceData['scheduledDatesJson'] ?? $cart->scheduled_dates_json,
                        'required_servicemen' => $serviceData['required_servicemen'] ?? $serviceData['selectedRequiredServiceMan'] ?? $cart->required_servicemen ?? 1,
                        'address_id' => $serviceData['primary_address']['id'] ?? $cart->address_id,
                        'custom_message' => $serviceData['selectedServiceNote'] ?? $cart->custom_message,
                        'select_serviceman_type' => $serviceData['selectServiceManType'] ?? $cart->select_serviceman_type,
                        'select_date_time_option' => $serviceData['selectDateTimeOption'] ?? $cart->select_date_time_option,
                        'selected_date_time_format' => $serviceData['selectedDateTimeFormat'] ?? $cart->selected_date_time_format,
                        'taxes' => $serviceData['taxes'] ?? $cart->taxes,
                        'discount' => $serviceData['discount'] ?? $cart->discount,
                        'discount_type' => $serviceData['discount_type'] ?? $cart->discount_type,
                    ]);

                    if (isset($serviceData['selectedServiceMan']) && is_array($serviceData['selectedServiceMan'])) {
                        $smIds = collect($serviceData['selectedServiceMan'])->pluck('id')->toArray();
                        $cart->servicemen()->sync($smIds);
                    }
                }
            }

            DB::commit();

            $cartItems = Cart::where('customer_id', $userId)->with(['service', 'servicePackage', 'address', 'servicemen'])->get();

            return response()->json([
                'success' => true,
                'message' => __('Cart item updated successfully'),
                'data' => (new CartResource($cart->load(['service', 'servicePackage', 'address', 'servicemen'])))->resolve(),
                'total' => $this->getCartTotalSummary($cartItems)
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $cart = Cart::where('customer_id', Helpers::getCurrentUserId())->findOrFail($id);
            $cart->delete();

            return response()->json([
                'success' => true,
                'message' => __('Cart removed successfully')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function emptyCart()
    {
        try {
            Cart::where('customer_id', Helpers::getCurrentUserId())->delete();

            return response()->json([
                'success' => true,
                'message' => __('Cart cleared successfully')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
