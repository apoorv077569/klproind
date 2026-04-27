@extends('backend.layouts.master')

@section('title', __('Help & Support'))

@section('content')
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5>{{ __('Help & Support Tickets') }}</h5>
                    <div class="btn-action">
                        <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                            style="display: none;" data-url="#">
                            <span id="count-selected-rows">0</span> {{ __('static.delete_selected') }}
                        </a>
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="help-ticket-table">
                        <div class="row g-3 mb-4 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Status') }}</label>
                                <select class="select-2 form-control" id="statusFilter">
                                    <option value="all">{{ __('All Status') }}</option>
                                    <option value="open" {{ request()->status == 'open' ? 'selected' : '' }}>{{ __('Open') }}</option>
                                    <option value="in-progress" {{ request()->status == 'in-progress' ? 'selected' : '' }}>{{ __('In Progress') }}</option>
                                    <option value="resolved" {{ request()->status == 'resolved' ? 'selected' : '' }}>{{ __('Resolved') }}</option>
                                    <option value="closed" {{ request()->status == 'closed' ? 'selected' : '' }}>{{ __('Closed') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Priority') }}</label>
                                <select class="select-2 form-control" id="priorityFilter">
                                    <option value="all">{{ __('All Priority') }}</option>
                                    <option value="low" {{ request()->priority == 'low' ? 'selected' : '' }}>{{ __('Low') }}</option>
                                    <option value="medium" {{ request()->priority == 'medium' ? 'selected' : '' }}>{{ __('Medium') }}</option>
                                    <option value="high" {{ request()->priority == 'high' ? 'selected' : '' }}>{{ __('High') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Role') }}</label>
                                <select class="select-2 form-control" id="roleFilter">
                                    <option value="all">{{ __('All Roles') }}</option>
                                    <option value="user" {{ request()->role == 'user' ? 'selected' : '' }}>{{ __('User (Consumer)') }}</option>
                                    <option value="provider" {{ request()->role == 'provider' ? 'selected' : '' }}>{{ __('Provider / Serviceman') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-primary w-100" id="applyFilters">
                                        <i class="ri-filter-2-line"></i> {{ __('Filter') }}
                                    </button>
                                    <a href="{{ route('backend.help-tickets.index') }}" class="btn btn-secondary" data-bs-toggle="tooltip" title="{{ __('Reset') }}">
                                        <i class="ri-refresh-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
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
    <script>
        $(document).ready(function() {
            var table = $('#help-ticket-table').DataTable();
            
            $('#applyFilters').on('click', function() {
                var status = $('#statusFilter').val();
                var priority = $('#priorityFilter').val();
                var role = $('#roleFilter').val();
                
                var url = new URL(window.location.href);
                url.searchParams.set('status', status);
                url.searchParams.set('priority', priority);
                url.searchParams.set('role', role);
                
                window.location.href = url.toString();
            });
        });
    </script>
@endpush
