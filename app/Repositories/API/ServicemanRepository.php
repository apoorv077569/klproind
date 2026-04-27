<?php

namespace App\Repositories\API;

use App\Enums\RoleEnum;
use App\Enums\UserTypeEnum;
use App\Exceptions\ExceptionHandler;
use App\Helpers\Helpers;
use App\Http\Resources\ServicemanResource;
use App\Models\Address;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\UserDocument;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Role;

class ServicemanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    protected $role;

    protected $address;

    protected $timeslot;

    public function model()
    {
        $this->address = new Address();
        $this->role = new Role();
        $this->timeslot = new TimeSlot();

        return User::class;
    }

    public function getServicemans()
    {
        try {

            return $this->model->role('serviceman')->with(['addresses', 'servicemanreviews', 'expertise']);

        } catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function show($id)
    {
        $serviceman = $this->model->with('expertise')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' =>  new ServicemanResource($serviceman),
        ]);

    }

    public function isProviderCanCreate()
    {
        if (Helpers::isUserLogin()) {
            $isAllowed = true;
            $roleName = Helpers::getCurrentRoleName();
            if ($roleName == RoleEnum::PROVIDER) {
                $isAllowed = false;
                $provider = Auth::user();
                $maxItems = $provider?->servicemans()->count();
                if (Helpers::isModuleEnable('Subscription')) {
                    if (function_exists('isPlanAllowed')) {
                        $isAllowed = isPlanAllowed('allowed_max_servicemen', $maxItems, $provider?->id);
                    }
                }

                if (! $isAllowed) {
                    $settings = Helpers::getSettings();
                    $max_serviceman = $settings['default_creation_limits']['allowed_max_servicemen'];
                    if ($max_serviceman > $maxItems) {
                        $isAllowed = true;
                    }
                }
            }

            return $isAllowed;
        }

        return true;
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            if (Helpers::isUserLogin()) {
                $roleName = Helpers::getCurrentRoleName();
                $provider = Auth::user();
                if ($roleName == RoleEnum::PROVIDER) {
                    if ($provider->type == UserTypeEnum::COMPANY && !$provider->company) {
                        throw new Exception(__('static.provider.please_fill_company_details_serviceman'), 422);
                    }

                    $hasDocuments = $provider->UserDocuments()->exists();
                    if (!$hasDocuments) {
                        throw new Exception(__('static.provider.please_upload_documents_first_serviceman'), 422);
                    }
                }
            }

            if ($this->isProviderCanCreate()) {
                $serviceman = $this->model->create([
                    'name' => $request->name,
                    'fcm_token' => $request->fcm_token,
                    'email' => $request->email,
                    'code' => $request->code,
                    'phone' => $request->phone,
                    'status' => $request->status ?? 1,
                    'password' => Hash::make($request->password),
                    'experience_interval' => $request->experience_interval,
                    'experience_duration' => $request->experience_duration,
                    'description' => $request->description,
                    'provider_id' => Helpers::isUserLogin() ? Helpers::getCurrentProviderId() : null,
                ]);

                $role = $this->role->where('name', RoleEnum::SERVICEMAN)->first();
                $serviceman->assignRole($role);

                if (!empty($request->known_languages)) {
                    $serviceman->knownLanguages()->attach($request->known_languages);
                }

                if (!empty($request->zones)) {
                    $serviceman->zones()->attach($request->zones);
                }

                if (!empty($request->services)) {
                    $serviceman->expertise()->attach($request->services);
                }

                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $serviceman->addMediaFromRequest('image')->toMediaCollection('image');
                }

                $addressType = $request->address_type;
                if ($addressType == 'other') {
                    $addressType = $request->custom_text;
                }

                $address = $this->address->create([
                    'user_id' => $serviceman->id,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'area' => $request->area,
                    'postal_code' => $request->postal_code,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city' => $request->city,
                    'address' => $request->address,
                    'street_address' => $request->street_address,
                    'type' => $addressType,
                    'alternative_name' => $request->alternative_name,
                    'code' => $request->alternative_code,
                    'alternative_phone' => $request->alternative_phone,
                    'is_primary' => 1,
                ]);

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => __('static.serviceman.store')
                ]);
            }

            throw new Exception(__('static.not_allow_for_creation'), 400);
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $serviceman = $this->model->findOrFail($id);
            $serviceman->update($request->all());

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $serviceman->clearMediaCollection('image');
                $serviceman->addMediaFromRequest('image')->toMediaCollection('image');
            }

            if (!empty($request->known_languages)) {
                $serviceman->knownLanguages()->sync($request->known_languages);
            }

            if (!empty($request->zones)) {
                $serviceman->zones()->sync($request->zones);
            }

            if (!empty($request->services)) {
                $serviceman->expertise()->sync($request->services);
            } else {
                $serviceman->expertise()->detach();
            }

            $addressType = $request->address_type ?? 'home';
            if ($addressType == 'other') {
                $addressType = $request->custom_text;
            }

            $address = Address::where('user_id', $serviceman->id)
                        ->where('id', $request->address_id)
                        ->first();
            if ($address) {
                $address->update([
                    'type' => $addressType,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'area' => $request->area,
                    'postal_code' => $request->postal_code,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city' => $request->city,
                    'address' => $request->address,
                    'street_address' => $request->street_address,
                    'alternative_name' => $request->alternative_name,
                    'code' => $request->alternative_code,
                    'alternative_phone' => $request->alternative_phone,
                    'status' => $request->status,
                ]);
            } else {
                throw new Exception(__('static.serviceman.invalid_address_id'), 400);
            }
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('static.serviceman.updated')
            ]);
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($serviceman)
    {
        $serviceman->delete();
        return response()->json([
            'success' => true,
            'message' => __('static.serviceman.destroy'),
        ]);
    }

    // ─────────────────────────────────────────────
    //  Time-Slot management (mirrors ProviderRepository)
    // ─────────────────────────────────────────────

    public function servicemanTimeslot($servicemanId)
    {
        $slot = $this->timeslot->where('serviceman_id', $servicemanId)->first();

        if (!$slot) {
            return response()->json([
                'success' => false,
                'message' => __('static.provider.time_slot_not_found'),
            ], 404);
        }

        return response()->json([
            'id'         => $slot->id,
            'serviceman' => $slot->serviceman ? [
                'id'   => $slot->serviceman->id,
                'name' => $slot->serviceman->name,
            ] : [],
            'time_slots' => $slot->time_slots,
            'is_active'  => $slot->is_active,
        ]);
    }

    public function storeServicemanTimeSlot($request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'time_slots'           => 'required|array|min:1',
                'time_slots.*.day'     => 'required|in:MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY,SATURDAY,SUNDAY',
                'time_slots.*.slots'   => 'nullable|array',
                'time_slots.*.slots.*' => 'nullable|date_format:H:i',
                'time_slots.*.is_active' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $serviceman_id = Helpers::getCurrentUserId();

            $existing = $this->timeslot->where('serviceman_id', $serviceman_id)->first();
            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => __('static.provider.time_slot_already_created'),
                ]);
            }

            $this->timeslot->create([
                'serviceman_id' => $serviceman_id,
                'time_slots'    => $request->time_slots,
                'is_active'     => true,
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('static.provider.time_slot_created'),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function updateServicemanTimeSlot($request)
    {
        DB::beginTransaction();
        try {
            $roleName = Helpers::getCurrentRoleName();

            if ($roleName !== RoleEnum::SERVICEMAN) {
                return response()->json([
                    'success' => false,
                    'message' => __('static.provider.auth_is_not_provider'),
                ]);
            }

            $validator = Validator::make($request->all(), [
                'time_slots'           => 'required|array|min:1',
                'time_slots.*.day'     => 'required|in:MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY,SATURDAY,SUNDAY',
                'time_slots.*.slots'   => 'nullable|array',
                'time_slots.*.slots.*' => 'nullable|date_format:H:i',
                'time_slots.*.is_active' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $serviceman_id = Helpers::getCurrentUserId();
            $timeSlot = $this->timeslot->where('serviceman_id', $serviceman_id)->first();

            if (!$timeSlot) {
                return response()->json([
                    'success' => false,
                    'message' => __('static.provider.create_time_slot'),
                ]);
            }

            $timeSlot->update([
                'time_slots' => $request->time_slots,
                'is_active'  => true,
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('static.provider.time_slot_updated'),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function updateServicemanTimeSlotStatus($status, $timeslotId)
    {
        DB::beginTransaction();
        try {
            $timeSlot = $this->timeslot->findOrFail($timeslotId);
            $timeSlot->update(['is_active' => $status]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => __('static.provider.time_slot_status_updated'),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
