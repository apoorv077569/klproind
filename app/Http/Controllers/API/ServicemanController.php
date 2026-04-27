<?php

namespace App\Http\Controllers\API;

use App\Enums\BookingEnumSlug;
use Exception;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Helpers\Helpers;
use Illuminate\Http\Request;
use App\Exceptions\ExceptionHandler;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServicemanResource;
use App\Repositories\API\ServicemanRepository;
use App\Http\Requests\API\CreateServicemanRequest;
use App\Http\Requests\API\UpdateServicemanRequest;

use App\Http\Traits\BookingTrait;

class ServicemanController extends Controller
{
    use BookingTrait;

    /**
     * Display a listing of the resource.
     */
    protected $repository;

    public function __construct(ServicemanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        try {

            $serviceman = $this->filter($this->repository->role(RoleEnum::SERVICEMAN), $request)->with('expertise');
            $perPage = $request->paginate ?? $serviceman->count();
            $serviceman = $serviceman->simplePaginate($perPage);
            return ServicemanResource::collection($serviceman ?? []);

        }
        catch (Exception $e) {

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function servicemenInUserZone(Request $request)
    {
        try {
            $user = auth('sanctum')->user();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
            }

            $primaryAddress = $user->primary_address;
            if (!$primaryAddress) {
                return response()->json(['success' => false, 'message' => 'Primary address not found for user'], 404);
            }

            $zoneId = $this->getZoneIdFromAddress($primaryAddress->id);
            if (!$zoneId) {
                return response()->json(['success' => false, 'message' => 'User zone not found'], 404);
            }

            $servicemen = User::role(RoleEnum::SERVICEMAN)
                ->where('status', true)
                ->with(['expertise' => function ($query) {
                    $query->where('status', true)->with('categories');
                }, 'zones'])
                ->whereHas('zones', function ($query) use ($zoneId) {
                    $query->where('zones.id', $zoneId);
                });

            if ($request->search) {
                $servicemen->where('name', 'like', '%' . $request->search . '%');
            }

            return ServicemanResource::collection(
                $servicemen->latest()->paginate($request->paginate ?? 10)
            );

        } catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServicemanRequest $request)
    {
        return $this->repository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->repository->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicemanRequest $request, User $serviceman)
    {
        return $this->repository->update($request, $serviceman->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $serviceman)
    {
        return $this->repository->destroy($serviceman);
    }

    public function filter($serviceman, $request)
    {
        // $servicemen = $serviceman->get();

        if (Helpers::isUserLogin()) {
            $roleName = Helpers::getCurrentRoleName();
            if ($roleName == RoleEnum::PROVIDER) {
                $serviceman = $serviceman->where('provider_id', Helpers::getCurrentProviderId());
            }
            else {
                $serviceman = $serviceman->where('status', true);
            }
        }

        $request->provider_id && $serviceman = $serviceman->where('provider_id', $request->provider_id);

        $request->search && $serviceman->where('name', 'like', '%' . $request->search . '%');

        if ($request->rating) {
            $ratings = explode(',', $request->rating);
            $serviceman = $serviceman->whereHas('servicemanreviews', function ($q) use ($ratings) {
                $q->whereIn('rating', $ratings);
            });
        }

        $request->id && $serviceman = $serviceman->where('id', $request->id);

        if ($request->field && $request->sort) {
            $serviceman = $serviceman->orderBy($request->field, $request->sort);
        }

        if ($request->experience) {
            $serviceman = match ($request->experience) {
                    'low' => $serviceman
                    ->orderByRaw('CASE WHEN experience_interval = "months" THEN 1 ELSE 2 END ASC')
                    ->orderBy('experience_duration', 'asc'),
                    'high' => $serviceman
                    ->orderByRaw('CASE WHEN experience_interval = "years" THEN 1 ELSE 2 END ASC')
                    ->orderBy('experience_duration', 'desc'),
                    default => $serviceman,
                };
        }

        $bookingStatusId = Helpers::getbookingStatusIdBySlug(BookingEnumSlug::COMPLETED);
        $serviceman = $serviceman->withCount([
            'servicemen_bookings as served' => function ($q) use ($bookingStatusId) {
            $q->where('booking_status_id', $bookingStatusId);
        }
        ]);

        if ($request->served === 'high') {
            $serviceman = $serviceman->orderByDesc('served');

        }
        elseif ($request->served === 'low') {
            $serviceman = $serviceman->orderBy('served');

        }

        // $serviceman = $serviceman->select([
        //     'id', 'name', 'email', 'provider_id', 'experience_duration','phone','code',
        //     'experience_interval', 'is_verified', 'status', 'type', 'deleted_at', 'served'
        // ]);

        return $serviceman;

    // return $serviceman->with('servicemanreviews', 'UserDocuments');
    }

    public function getServicemanByRating($ratings, $serviceman)
    {
        return $serviceman->where(function ($query) use ($ratings) {
            foreach ($ratings as $rating) {
                $query->orWhere(function ($query) use ($rating) {
                            $query->whereHas('reviews', function ($query) use ($rating) {
                                    $query->select('serviceman_id')
                                        ->groupBy('serviceman_id')
                                        ->havingRaw('AVG(rating) >= ?', [$rating])
                                        ->havingRaw('AVG(rating) < ?', [$rating + 1]);
                                }
                                );
                            }
                            );
                        }
                    });
    }

    // ─────────────────────────────────────────────
    //  Time-Slot endpoints (mirrors ProviderController)
    // ─────────────────────────────────────────────

    public function servicemanTimeSlot(Request $request)
    {
        return $this->repository->servicemanTimeslot($request->serviceman_id);
    }

    public function storeServicemanTimeSlot(Request $request)
    {
        return $this->repository->storeServicemanTimeSlot($request);
    }

    public function updateServicemanTimeSlot(Request $request)
    {
        return $this->repository->updateServicemanTimeSlot($request);
    }

    public function updateServicemanTimeSlotStatus(Request $request, $timeslotId)
    {
        return $this->repository->updateServicemanTimeSlotStatus($request->status, $timeslotId);
    }

    public function getZoneServices(Request $request)
    {
        $zoneIds = $request->zone_id;
        if (!$zoneIds || empty($zoneIds)) {
            return response()->json([]);
        }

        if (!is_array($zoneIds)) {
            $zoneIds = [$zoneIds];
        }

        $services = \App\Models\Service::where('status', 1)
            ->where(function($query) use ($zoneIds) {
                $query->whereIn('zone_id', $zoneIds)
                ->orWhereHas('zones', function($q) use ($zoneIds) {
                    $q->whereIn('zones.id', $zoneIds);
                });
            })
            ->get(['id', 'title']);

        $formattedServices = [];
        foreach ($services as $service) {
            $formattedServices[$service->id] = $service->title;
        }

        return response()->json($formattedServices);
    }

    public function dropdowns()
    {
        try {
            return response()->json([
                'zones' => \App\Models\Zone::where('status', 1)->get(['id', 'name']),
                'countries' => Helpers::getCountries(),
                // 'languages' => \App\Models\Language::pluck('key', 'id'),
                'languages' => \App\Models\Language::whereIn('key', ['English', 'Hindi'])
                ->pluck('key', 'id'),
                'experience_intervals' => ['years' => 'Years', 'months' => 'Months'],
                'address_types' => ['home' => 'Home', 'work' => 'Work', 'other' => 'Other']
            ]);
        }
        catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
