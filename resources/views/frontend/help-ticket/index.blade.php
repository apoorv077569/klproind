@use('app\Helpers\Helpers')

@extends('frontend.layout.master')

@section('title', __('Help & Support'))

@section('breadcrumb')
<nav class="breadcrumb breadcrumb-icon">
    <a class="breadcrumb-item" href="{{url('/')}}">{{ __('frontend::static.account.home') }}</a>
    <span class="breadcrumb-item active">{{ __('Help & Support') }}</span>
</nav>
@endsection

@section('content')
<section class="section-b-space">
    <div class="container-fluid-md">
        <div class="profile-body-wrapper">
            <div class="row">
                @includeIf('frontend.account.sidebar')
                <div class="col-xxl-9 col-xl-8">
                    <button class="filter-btn btn theme-bg-color text-white w-max d-xl-none d-inline-block mb-3">
                    {{ __('frontend::static.account.show_menu') }}
                    </button>
                    <div class="profile-main h-100">
                        <div class="card m-0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="title-3">
                                    <h3>{{ __('My Support Tickets') }}</h3>
                                </div>
                                <a href="{{ route('frontend.help-tickets.create') }}" class="btn btn-solid btn-sm">
                                    {{ __('Raise New Ticket') }}
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive custom-scrollbar">
                                    <table class="table hover custom-table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Ticket ID') }}</th>
                                                <th>{{ __('Subject') }}</th>
                                                <th>{{ __('Priority') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($tickets as $ticket)
                                                <tr>
                                                    <td><strong>{{ $ticket->ticket_id }}</strong></td>
                                                    <td>{{ $ticket->subject }}</td>
                                                    <td>
                                                        <span class="badge {{ $ticket->priority == 'high' ? 'bg-danger' : ($ticket->priority == 'medium' ? 'bg-warning' : 'bg-primary') }}">
                                                            {{ ucfirst($ticket->priority) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $statusClass = [
                                                                'open' => 'bg-info',
                                                                'in-progress' => 'bg-warning',
                                                                'resolved' => 'bg-success',
                                                                'closed' => 'bg-secondary',
                                                            ];
                                                        @endphp
                                                        <span class="badge {{ $statusClass[$ticket->status] ?? 'bg-primary' }}">
                                                            {{ ucfirst($ticket->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $ticket->created_at->format('d M, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('frontend.help-tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-primary" title="View Detail">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        <img src="{{ asset('frontend/images/no-data.png') }}" alt="" style="width: 100px; opacity: 0.5;">
                                                        <p class="mt-2 text-muted">{{ __('No tickets raised yet.') }}</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $tickets->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    if(typeof feather !== 'undefined') {
        feather.replace();
    }
</script>
@endpush
