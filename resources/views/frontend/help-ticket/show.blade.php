@use('app\Helpers\Helpers')

@extends('frontend.layout.master')

@section('title', __('Ticket #') . $ticket->ticket_id)

@section('breadcrumb')
<nav class="breadcrumb breadcrumb-icon">
    <a class="breadcrumb-item" href="{{url('/')}}">{{ __('frontend::static.account.home') }}</a>
    <a class="breadcrumb-item" href="{{ route('frontend.help-tickets.index') }}">{{ __('Help & Support') }}</a>
    <span class="breadcrumb-item active">{{ __('Ticket #') . $ticket->ticket_id }}</span>
</nav>
@endsection

@section('content')
<section class="section-b-space">
    <div class="container-fluid-md">
        <div class="profile-body-wrapper">
            <div class="row">
                @includeIf('frontend.account.sidebar')
                <div class="col-xxl-9 col-xl-8">
                    <div class="profile-main h-100">
                        <div class="row g-3">
                            <!-- Ticket Stats -->
                            <div class="col-lg-4 col-md-5">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-white py-3 border-bottom">
                                        <h4 class="mb-0">{{ __('Ticket Summary') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush small">
                                            <li class="list-group-item d-flex justify-content-between px-0">
                                                <span class="text-muted">{{ __('ID') }}:</span>
                                                <strong>#{{ $ticket->ticket_id }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between px-0">
                                                <span class="text-muted">{{ __('Created') }}:</span>
                                                <span>{{ $ticket->created_at->format('d M, Y') }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between px-0 align-items-center">
                                                <span class="text-muted">{{ __('Status') }}:</span>
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
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between px-0 align-items-center">
                                                <span class="text-muted">{{ __('Priority') }}:</span>
                                                <span class="badge {{ $ticket->priority == 'high' ? 'bg-danger' : ($ticket->priority == 'medium' ? 'bg-warning' : 'bg-primary') }}">
                                                    {{ ucfirst($ticket->priority) }}
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between px-0">
                                                <span class="text-muted">{{ __('Category') }}:</span>
                                                <span>{{ $ticket->category }}</span>
                                            </li>
                                            @if($ticket->booking)
                                            <li class="list-group-item d-flex justify-content-between px-0">
                                                <span class="text-muted">{{ __('Booking') }}:</span>
                                                <a href="{{ route('frontend.booking.show', $ticket->booking_id) }}" class="theme-color">#{{ $ticket->booking->booking_number }}</a>
                                            </li>
                                            @endif
                                        </ul>
                                        <div class="mt-4">
                                            <h6 class="fw-bold mb-2">{{ __('Subject') }}</h6>
                                            <p class="small text-dark">{{ $ticket->subject }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Chat Area -->
                            <div class="col-lg-8 col-md-7">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">{{ __('Conversation') }}</h4>
                                    </div>
                                    <div class="card-body p-0 d-flex flex-column" style="height: 600px;">
                                        <div class="flex-grow-1 overflow-auto p-4 custom-scrollbar bg-light" id="chat-window" style="background-color: #f8f9fa !important;">
                                            
                                            <!-- Initial Message -->
                                            <div class="mb-4">
                                                <div class="d-flex align-items-start gap-2">
                                                    <div class="flex-grow-1" style="max-width: 85%;">
                                                        <div class="p-3 bg-white shadow-sm rounded-3 border-start border-primary border-3">
                                                            <p class="mb-2 text-dark">{{ $ticket->description }}</p>
                                                            @if($ticket->hasMedia('attachments'))
                                                                <div class="mt-2 border-top pt-2">
                                                                    @foreach($ticket->getMedia('attachments') as $media)
                                                                        <a href="{{ $media->getUrl() }}" target="_blank" class="badge bg-light text-dark p-2 mb-1 text-decoration-none border">
                                                                            <i class="iconsax small me-1" icon-name="gallery"></i> {{ $media->file_name }}
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <small class="text-muted mt-1 d-block">{{ $ticket->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Replies -->
                                            @foreach($ticket->replies as $reply)
                                                @php $isMe = $reply->user_id == auth()->id(); @endphp
                                                <div class="mb-4 d-flex {{ $isMe ? 'justify-content-end' : 'justify-content-start' }}">
                                                    <div style="max-width: 85%;">
                                                        <div class="p-3 shadow-sm rounded-3 {{ $isMe ? 'bg-primary text-white' : 'bg-white text-dark' }} {{ !$isMe ? 'border-start border-info border-3' : '' }}">
                                                            @if(!$isMe) <small class="fw-bold d-block mb-1 theme-color">{{ $reply->user->name }}</small> @endif
                                                            <p class="mb-2">{{ $reply->message }}</p>
                                                            @if($reply->hasMedia('attachments'))
                                                                <div class="mt-2 border-top pt-2 {{ $isMe ? 'border-light' : 'border-info' }}">
                                                                    @foreach($reply->getMedia('attachments') as $media)
                                                                        <a href="{{ $media->getUrl() }}" target="_blank" class="badge {{ $isMe ? 'bg-white text-dark' : 'bg-light text-dark shadow-sm' }} p-2 mb-1 text-decoration-none border">
                                                                            <i class="iconsax small me-1" icon-name="gallery"></i> Attachment
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <small class="text-muted mt-1 d-block {{ $isMe ? 'text-end' : '' }}">{{ $reply->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if($ticket->status != 'closed')
                                            <div class="p-4 bg-white border-top">
                                                <form action="{{ route('frontend.help-tickets.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <textarea name="message" class="form-control" rows="2" placeholder="Write your reply or provide more info..." required></textarea>
                                                        <button type="submit" class="btn btn-solid"><i class="iconsax" icon-name="send-1"></i></button>
                                                    </div>
                                                    <div class="mt-2 d-flex align-items-center">
                                                        <input type="file" name="attachments[]" class="form-control form-control-sm" multiple id="replyAttachments">
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="p-4 bg-white text-center border-top">
                                                <span class="badge bg-secondary px-3 py-2">{{ __('This ticket is closed.') }}</span>
                                            </div>
                                        @endif
                                    </div>
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
    $(document).ready(function() {
        var objDiv = document.getElementById("chat-window");
        if(objDiv) {
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    });
</script>
@endpush

<style>
    .bg-primary {
        background-color: var(--theme-color) !important;
    }
    .theme-color {
        color: var(--theme-color) !important;
    }
    .btn-solid {
        background-color: var(--theme-color) !important;
        border-color: var(--theme-color) !important;
    }
</style>
