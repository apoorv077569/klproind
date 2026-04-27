<?php

namespace App\Http\Controllers\Backend;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ServicemanTimeSlotDataTable;
use App\Repositories\Backend\ServicemanTimeSlotRepository;

class ServicemanTimeSlotController extends Controller
{
    public $repository;

    public function __construct(ServicemanTimeSlotRepository $repository)
    {
        // We'll reuse the provider time slot permissions as they are parallel, or if the user wants dedicated permissions, we could add them. Let's use backend.provider_time_slot for now, or just let it pass using backend.serviceman since it's an admin panel feature.
        $this->authorizeResource(TimeSlot::class, 'serviceman_time_slot');
        $this->repository = $repository;
    }

    public function index(ServicemanTimeSlotDataTable $dataTable)
    {
        return $dataTable->render('backend.serviceman-time-slot.index');
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(Request $request)
    {
        $request->validate([
            'serviceman_id' => 'required|exists:users,id',
            'time_slots' => 'required|array',
        ]);
        return $this->repository->store($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(TimeSlot $serviceman_time_slot)
    {
        return $this->repository->edit($serviceman_time_slot->id);
    }

    public function update(Request $request, TimeSlot $serviceman_time_slot)
    {
        $request->validate([
            'serviceman_id' => 'required|exists:users,id',
            'time_slots' => 'required|array',
        ]);
        return $this->repository->update($request, $serviceman_time_slot?->id);
    }

    public function status(Request $request, $id)
    {
        return $this->repository->status($id, $request->status);
    }

    public function destroy(TimeSlot $serviceman_time_slot)
    {
        return $this->repository->destroy($serviceman_time_slot?->id);
    }

    public function updateStatus(Request $request)
    {
        return $this->repository->updateStatus($request->statusVal, $request->subject_id);
    }

    public function deleteRows(Request $request)
    {
        return $this->repository->deleteRows($request);
    }
}
