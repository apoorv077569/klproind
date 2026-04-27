<?php

namespace App\Repositories\Backend;

use App\Models\TimeSlot;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class ServicemanTimeSlotRepository extends BaseRepository
{
    protected $serviceman;

    public function model()
    {
        $this->serviceman = new User();

        return TimeSlot::class;
    }

    public function index()
    {
        return view('backend.serviceman-time-slot.index');
    }

    public function create($attribute = [])
    {
        $servicemen = [];
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            $servicemen = $this->serviceman->role('serviceman')->get();
        }

        return view('backend.serviceman-time-slot.create', [
            'servicemen' => $servicemen,
        ]);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $existing = $this->model->where('serviceman_id', $request->serviceman_id)->first();
            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => __('static.provider.time_slot_already_created'),
                ]);
            }
            $timeSlotData = [];

            foreach ($request->time_slots as $day => $info) {
                $timeSlotData[] = [
                    'day' => $day,
                    'slots' => $info['slots'] ?? [],
                    'is_active' => isset($info['is_active']) ? 1 : 0,
                ];
            }
        
            $this->model::create([
                'serviceman_id' => $request->serviceman_id,
                'time_slots' => $timeSlotData,
            ]);
            
            DB::commit();
            return redirect()->route('backend.serviceman-time-slot.index')->with('message', 'Time Slot Created Successfully.');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $timeSlot = $this->model->findOrFail($id);
        $servicemen = [];
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            $servicemen = $this->serviceman->role('serviceman')->get();
        }

        $decodedSlots = $timeSlot->time_slots;
        $timeSlots = [];
        foreach ($decodedSlots as $slot) {
            $timeSlots[$slot['day']] = [
                'slots' => $slot['slots'],
                'is_active' => $slot['is_active'],
            ];
        }
        return view('backend.serviceman-time-slot.edit', [
            'timeSlot' => $timeSlot,
            'servicemen' => $servicemen,
            'timeSlots' => $timeSlots,
        ]);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $timeSlot = $this->model->findOrFail($id);
            $timeSlotData = [];
            foreach ($request->time_slots as $day => $info) {
                $timeSlotData[] = [
                    'day' => $day,
                    'slots' => $info['slots'] ?? [],
                    'is_active' => isset($info['is_active']) ? 1 : 0,
                ];
            }
            
            // Update the existing time slot
            $timeSlot->update([
                'serviceman_id' => $request->serviceman_id,
                'time_slots' => $timeSlotData,
            ]);

            DB::commit();
            return redirect()->route('backend.serviceman-time-slot.index')->with('message', 'Time Slot Updated Successfully');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $timeSlot = $this->model->findOrFail($id);
            $timeSlot->destroy($id);

            DB::commit();
            return redirect()->route('backend.serviceman-time-slot.index')->with('message', __('static.provider_time_slot.time_slots_deleted_successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }

    public function status($id, $status)
    {
        try {
            $timeSlot = $this->model->findOrFail($id);
            $timeSlot->update(['status' => $status]);

            return json_encode(['resp' => $timeSlot]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteRows($request)
    {
        try {
            foreach ($request->id as $row => $key) {
                $servicemanTimeSlot = $this->model->findOrFail($request->id[$row]);
                $servicemanTimeSlot->delete();
            }
            return  redirect()->route('backend.serviceman-time-slot.index')->with('message', __('static.provider_time_slot.time_slots_deleted_successfully'));
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
