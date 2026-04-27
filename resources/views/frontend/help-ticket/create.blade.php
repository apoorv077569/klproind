@use('app\Helpers\Helpers')

@extends('frontend.layout.master')

@section('title', __('Raise Support Ticket'))

@section('breadcrumb')
<nav class="breadcrumb breadcrumb-icon">
    <a class="breadcrumb-item" href="{{url('/')}}">{{ __('frontend::static.account.home') }}</a>
    <a class="breadcrumb-item" href="{{ route('frontend.help-tickets.index') }}">{{ __('Help & Support') }}</a>
    <span class="breadcrumb-item active">{{ __('Raise Ticket') }}</span>
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
                        <div class="card m-0 border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom py-3">
                                <div class="title-3">
                                    <h3 class="mb-0">{{ __('Raise a Support Ticket') }}</h3>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('frontend.help-tickets.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                                    @csrf
                                    
                                    <div class="col-md-12">
                                        <label class="form-label fw-600">{{ __('Subject') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control" placeholder="Briefly describe the issue" required value="{{ old('subject') }}">
                                        @error('subject') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-600">{{ __('Category') }} <span class="text-danger">*</span></label>
                                        <select name="category" class="form-select" required>
                                            <option value="">{{ __('Select Category') }}</option>
                                            <option value="Technical" {{ old('category') == 'Technical' ? 'selected' : '' }}>Technical Issue</option>
                                            <option value="Billing" {{ old('category') == 'Billing' ? 'selected' : '' }}>Billing & Payment</option>
                                            <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General Query</option>
                                            <option value="Booking" {{ old('category') || isset($booking) ? 'selected' : '' }}>Booking Related</option>
                                        </select>
                                        @error('category') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-600">{{ __('Priority') }} <span class="text-danger">*</span></label>
                                        <select name="priority" class="form-select" required>
                                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                            <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                        </select>
                                        @error('priority') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    @if(isset($booking))
                                        <div class="col-md-12">
                                            <label class="form-label fw-600">{{ __('Related Booking') }}</label>
                                            <div class="alert alert-info py-2 px-3 mb-0">
                                                Selected Booking: <strong>#{{ $booking->booking_number }}</strong>
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <label class="form-label fw-600">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" rows="5" placeholder="Detailed explanation of your concern..." required>{{ old('description') }}</textarea>
                                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-600">{{ __('Attachments (Screenshots/Docs)') }}</label>
                                        <div class="upload-box border rounded p-3 text-center bg-light">
                                            <input type="file" name="attachments[]" class="form-control" multiple accept="image/*,.pdf" id="attachments">
                                            <label for="attachments" class="mt-2 text-muted small">
                                                <i class="iconsax me-1" icon-name="gallery"></i> {{ __('You can upload multiple files (Max 2MB each)') }}
                                            </label>
                                        </div>
                                        @error('attachments.*') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 mt-4 text-end">
                                        <a href="{{ route('frontend.help-tickets.index') }}" class="btn btn-outline btn-md me-2">{{ __('Cancel') }}</a>
                                        <button type="submit" class="btn btn-solid btn-md px-5">{{ __('Submit Ticket') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
