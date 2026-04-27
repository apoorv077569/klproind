@extends('backend.layouts.master')
@section('title', 'Edit Provider Time Slot')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/flatpickr.min.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>Edit Provider Time Slot</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.serviceman-time-slot.update', $timeSlot->id) }}"
                        id="servicemanTimeSlotForm" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @include('backend.serviceman-time-slot.fields')
                        <div class="card-footer">
                            <button class="btn btn-primary spinner-btn"
                                type="submit">{{ __('static.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/js/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/js/custom-flatpickr.js') }}"></script>
@endpush
