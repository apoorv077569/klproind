@extends('backend.layouts.master')

@section('title', __('Ticket Detail'))

@section('content')
<div class="row g-sm-4 g-3">
    <div class="col-xxl-4 col-xl-5">
        <div class="card h-100">
            <div class="card-header">
                <h5>{{ __('Ticket Information') }}</h5>
            </div>
            <div class="card-body">
                <div class="ticket-info">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Ticket ID') }}:</strong>
                            <span>{{ $ticket->ticket_id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Status') }}:</strong>
                            <form action="{{ route('backend.help-tickets.status', $ticket->id) }}" method="POST" id="statusForm">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="in-progress" {{ $ticket->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </form>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Priority') }}:</strong>
                            <span class="badge {{ $ticket->priority == 'high' ? 'bg-danger' : ($ticket->priority == 'medium' ? 'bg-warning' : 'bg-primary') }}">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Category') }}:</strong>
                            <span>{{ $ticket->category }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Raised By') }}:</strong>
                            <span>{{ $ticket->user->name }}</span>
                        </li>
                        @if($ticket->booking)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <strong>{{ __('Related Booking') }}:</strong>
                            <a href="{{ route('backend.booking.show', $ticket->booking_id) }}">#{{ $ticket->booking->booking_number }}</a>
                        </li>
                        @endif
                    </ul>
                    <div class="mt-4">
                        <h6>{{ __('Subject') }}:</h6>
                        <p class="text-muted">{{ $ticket->subject }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xxl-8 col-xl-7">
        <div class="card h-100 chatting-main-box">
            <div class="card-header">
                <h5>{{ __('Conversation') }}</h5>
            </div>
            <div class="card-body p-0">
                <div class="right-sidebar-chat p-0">
                    <div class="right-sidebar-Chats p-3 custom-scrollbar" id="messages" style="height: 500px; overflow-y: auto; background: #f9f9f9;">
                        
                        <!-- Initial Description -->
                        <div class="user-reply mb-4 d-flex">
                            <div class="chatting-box w-100">
                                <div class="message-content">
                                    <p class="mb-2">{{ $ticket->description }}</p>
                                    @if($ticket->hasMedia('attachments'))
                                        <div class="attachments mt-2 border-top pt-2">
                                            @foreach($ticket->getMedia('attachments') as $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" class="badge bg-light text-dark p-2 mb-1 text-decoration-none">
                                                    <i data-feather="paperclip" style="width:14px;"></i> {{ $media->file_name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <h6 class="timing text-end mt-1">{{ $ticket->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>

                        <!-- Replies -->
                        @foreach($ticket->replies as $reply)
                            <div class="{{ $reply->user_id == auth()->id() ? 'admin-reply' : 'user-reply' }} mb-4 d-flex">
                                <div class="chatting-box w-100">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small class="fw-bold">{{ $reply->user->name }}</small>
                                    </div>
                                    <div class="message-content">
                                        <p class="mb-2">{{ $reply->message }}</p>
                                        @if($reply->hasMedia('attachments'))
                                            <div class="attachments mt-2 border-top pt-2">
                                                @foreach($reply->getMedia('attachments') as $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank" class="badge bg-light text-dark p-2 mb-1 text-decoration-none">
                                                        <i data-feather="paperclip" style="width:14px;"></i> {{ $media->file_name }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <h6 class="timing text-end mt-1">{{ $reply->created_at->diffForHumans() }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="msger-inputarea p-3 border-top bg-white">
                        <form action="{{ route('backend.help-tickets.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <textarea name="message" class="form-control" rows="2" placeholder="Type your reply..." required></textarea>
                                <button type="submit" class="btn btn-primary"><i data-feather="send"></i></button>
                            </div>
                            <!--<div class="mt-2">
                                <div class="d-flex align-items-center">
                                    <input type="file" name="attachments[]" class="form-control form-control-sm" multiple id="attachmentInput">
                                    <label for="attachmentInput" class="ms-2 text-muted" style="font-size: 12px; cursor:pointer;" title="Attach files">
                                        <i data-feather="paperclip"></i>
                                    </label>
                                </div>
                                <small class="text-muted d-block mt-1">Files: JPG, PNG, PDF (Max 2MB each)</small>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var objDiv = document.getElementById("messages");
        if(objDiv) {
            objDiv.scrollTop = objDiv.scrollHeight;
        }
        if(typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endpush

<style>
    .right-sidebar-Chats {
        display: flex;
        flex-direction: column;
    }
    .chatting-box {
        padding: 12px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        max-width: 85%;
    }
    .admin-reply {
        justify-content: flex-end;
    }
    .admin-reply .chatting-box {
        background: #eff6ff;
        border-right: 3px solid var(--primary-color);
    }
    .user-reply .chatting-box {
        background: #ffffff;
        border-left: 3px solid #6c757d;
    }
    .message-content p {
        margin: 0;
        line-height: 1.5;
        color: #333;
    }
    .timing {
        font-size: 10px;
        color: #888;
    }
</style>
