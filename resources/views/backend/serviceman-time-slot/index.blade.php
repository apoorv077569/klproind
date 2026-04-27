@use('App\Models\TimeSlot')

@extends('backend.layouts.master')

@section('title', 'Provider Time Slots')

@section('content')
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5>Provider Time Slots</h5>
                    <div class="btn-action">

                        @php
                            $user = auth()->user();
                        @endphp

                        @if ($user && $user->hasRole('admin') || $user->can('backend.serviceman.create'))
                            @can('backend.serviceman.create')
                                <div class="btn-popup mb-0">
                                    <a href="{{ route('backend.serviceman-time-slot.create') }}"
                                        class="btn">{{ __('static.provider_time_slot.create') }}
                                    </a>
                                </div>
                            @endcan
                        @endif

                        @can('backend.serviceman.destroy')
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                                style="display: none;" data-url="{{ route('backend.delete.serviceman-time-slots') }}">
                                <span id="count-selected-rows">0</span> {{ __('static.delete_selected') }}
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="serviceman-time-slot-table">
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
