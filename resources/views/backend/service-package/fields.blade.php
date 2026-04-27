@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/flatpickr.min.css') }}">
@endpush
@use('app\Helpers\Helpers')

    <div class="form-group row">
        <label class="col-md-2" for="name">{{ __('static.language.languages') }}</label>
        <div class="col-md-10">
            <ul class="language-list">
                @forelse (\App\Helpers\Helpers::getLanguages() as $lang)
                    @if(isset($service_package))
                        <li>
                            <a href="{{ route('backend.service-package.edit', ['service_package' => $service_package->id, 'locale' => $lang->locale]) }}" class="language-switcher {{ request('locale') === $lang->locale ? 'active' : '' }}" target="_blank"><img src="{{ @$lang?->flag ?? asset('admin/images/No-image-found.jpg') }}" alt=""> {{ @$lang?->name }} ({{ @$lang?->locale }})<i data-feather="arrow-up-right"></i></a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('backend.service-package.create', ['locale' => $lang->locale]) }}" class="language-switcher {{ request('locale') === $lang->locale ? 'active' : '' }}" target="blank"><img src="{{ @$lang?->flag ?? asset('admin/images/No-image-found.jpg') }}" alt=""> {{ @$lang?->name }} ({{ @$lang?->locale }})<i data-feather="arrow-up-right"></i></a>
                        </li>
                    @endif
                @empty
                    <li>
                        <a href="{{ route('backend.service-package.edit', ['service_package' => $service_package->id, 'locale' => Session::get('locale', 'en')]) }}" class="language-switcher active" target="blank"><img src="{{ asset('admin/images/flags/LR.png') }}" alt="">English<i data-feather="arrow-up-right"></i></a>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

<input type="hidden" name="locale" value="{{ request('locale') }}">
<div class="form-group row">
    <label for="image" class="col-md-2">{{ __('static.categories.image') }}
        ({{ request('locale', app()->getLocale()) }})</label>
    <div class="col-md-10">
        <input class='form-control' type="file" accept=".jpg, .png, .jpeg" id="image" name="image[]">
        @error('image')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

@if (isset($service_package))
    @php
        $locale = request('locale');
        $mediaItems = $service_package->getMedia('image')->filter(function ($media) use ($locale) {
            return $media->getCustomProperty('language') === $locale;
        });
    @endphp
    @if ($mediaItems->count() > 0)
        <div class="form-group">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="image-list">
                        @foreach ($mediaItems as $media)
                            <div class="image-list-detail">
                                <div class="position-relative">
                                    <img src="{{ $media->getUrl() }}" id="{{ $media->id }}"
                                        alt="Service Package Image" class="image-list-item">
                                    <div class="close-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
<div class="form-group row">
    <label class="col-md-2" for="title">{{ __('static.title') }}
        ({{ request('locale', app()->getLocale()) }})<span> *</span></label>
    <div class="col-md-10">
        <div class="input-copy-box">
            <input class='form-control' type="text" id="title" name="title"
                value="{{ isset($service_package) ? $service_package->getTranslation('title', request('locale', app()->getLocale())) : old('title') }}"
                placeholder="{{ __('static.service_package.enter_title') }} ({{ request('locale', app()->getLocale()) }})">
            @error('title')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- Copy Icon -->
            <span class="input-copy-icon" data-tooltip="Copy">
                <i data-feather="copy"></i>
            </span>
            <!-- AI Generate Title Button -->
            <button type="button" class="btn btn-sm ai-generate-title-btn" 
                    data-url="{{ route('backend.custom-ai-model.generate-title') }}"
                    data-content_type="service"
                    data-locale="{{ request('locale', app()->getLocale()) }}"
                    style="margin-left: 8px;">
                Generate Title
            </button>
        </div>
    </div>
</div>
<!-- Removed Provider Selection Fields as per user request -->


<div class="form-group row">
    <label class="col-md-2" for="zone_id">{{ __('static.zone.zones') }}<span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        @php
            if (!isset($zones)) {
                $zones = \App\Models\Zone::where('status', '1')->get();
            }
        @endphp
        <select class="select-2 form-control" id="zone_id" name="zone_id[]" search="true"
            data-placeholder="{{ __('static.service_package.select_zone') }}" multiple>
            @foreach ($zones as $zone)
                <option value="{{ $zone->id }}"
                    {{ (collect(old('zone_id', isset($service_package) ? $service_package->zones->pluck('id')->toArray() : []))->contains($zone->id)) ? 'selected' : '' }}>
                    {{ $zone->name }}
                </option>
            @endforeach
        </select>
        @error('zone_id')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="serviceman_id">{{ __('static.dashboard.servicemen') }}<span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control user-dropdown" id="serviceman_id" name="serviceman_id[]" search="true"
            data-placeholder="{{ __('static.service_package.select_serviceman') }}" multiple>
            @if(isset($service_package))
                @foreach ($service_package->servicemen as $serviceman)
                    <option value="{{ $serviceman->id }}" selected>
                        {{ $serviceman->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @error('serviceman_id')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class='form-group row d-none'>
    <label class="col-md-2" for="service_id">{{ __('static.service_package.services') }}</label>
    <div class="col-md-10 error-div select-dropdown">
        <select id="services" class="select-2 form-control user-dropdown disable-all" search="true" name="service_id[]"
            data-placeholder="{{ __('static.service_package.select_services') }}" multiple>
            <option value=""></option>
        </select>
        @error('service_id')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="price">{{ __('static.service_package.price') }}<span> *</span></label>
    <div class="col-md-10 error-div">
        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text">{{ Helpers::getSettings()['general']['default_currency']->symbol }}</span>
            <div class="w-100">
                <input class='form-control' type="number" id="price" name="price" min="1"
                    value="{{ isset($service_package->price) ? $service_package->price : old('price') }}"
                    placeholder="{{ __('static.service_package.enter_price') }}">
                @error('price')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="discount">{{ __('static.service_package.discount') }}<span> *</span></label>
    <div class="col-md-10 error-div">
        <div class="input-group mb-3 flex-nowrap">
            <div class="w-100 percent">
                <input class='form-control' id="discount" type="number" name="discount" min="1"
                    value="{{ $service_package->discount ?? old('discount') }}"
                    placeholder="{{ __('static.service_package.enter_discount') }}"
                    oninput="if (value > 100) value = 100; if (value < 0) value = 0;">
            </div>
            <span class="input-group-text">%</span>
            @error('discount')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-2">{{ __('static.service_package.description') }}
        ({{ request('locale', app()->getLocale()) }})</label>
    <div class="col-md-10">
        <div class="input-copy-box">
            <textarea class="form-control" rows="4" name="description" id="description"
                placeholder="{{ __('static.tag.enter_description') }} ({{ request('locale', app()->getLocale()) }})"
                cols="50">{{ isset($service_package) ? $service_package->getTranslation('description', request('locale', app()->getLocale())) : old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- Copy Icon -->
            <span class="input-copy-icon" data-tooltip="Copy">
                <i data-feather="copy"></i>
            </span>
        </div>
        <!-- AI Generate Description Button -->
        <div style="margin-top: 8px;">
            <button type="button" class="btn btn-sm ai-generate-description-btn" 
                    data-url="{{ route('backend.custom-ai-model.generate-description') }}"
                    data-content_type="service_package"
                    data-locale="{{ request('locale', app()->getLocale()) }}">
                Generate Description
            </button>
        </div>
    </div>
</div>

<div class="form-group row flatpicker-calender">
    <label class="col-md-2" for="start_end_date">{{ __('static.service_package.date') }}<span> *</span> </label>
    <div class="col-md-10">
        @if (isset($service_package))
            <input class="form-control" id="date-range"
                value="{{ \Carbon\Carbon::parse(@$service_package->started_at)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse(@$service_package->ended_at)->format('d-m-Y') }}"
                name="start_end_date" placeholder="{{ __('static.service_package.select_date') }}">
        @else
            <input class="form-control" id="date-range" name="start_end_date"
                placeholder="{{ __('static.service_package.select_date') }}">
        @endif
        @error('start_end_date')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="bg_color">{{ __('static.service.bg_color') }}<span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control" id="bg_color" name="bg_color"
            data-placeholder="{{ __('static.service.select_bg_color') }}">
            <option class="select-placeholder" value=""></option>
            @foreach (['primary', 'secondary', 'info', 'success', 'warning', 'danger'] as $bg_color)
                <option class="option" value="{{ $bg_color }}"
                    {{ old('bg_color', isset($service_package) ? $service_package->bg_color : '') == $bg_color ? 'selected' : '' }}>
                    {{ ucfirst($bg_color) }}
                </option>
            @endforeach
        </select>
        @error('bg_color')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2" for="hexa_code">{{ __('static.hexa_code') }}<span> *</span></label>
    <div class="col-md-10">
        <div class="d-flex align-items-center gap-2">
            <input class="form-control" type="color" name="hexa_code" id="hexa_code"
                value="{{ isset($service_package->hexa_code) ? $service_package->hexa_code : old('hexa_code') }}"
                placeholder="{{ __('static.service_package.enter_color') }}">
            <span class="color-picker">#000</span>
        </div>
        @error('hexa_code')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2" for="role">{{ __('static.service_package.is_featured') }}</label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                @if (isset($service_package))
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id=""
                        value="1" {{ $service_package->is_featured ? 'checked' : '' }}>
                @else
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id=""
                        value="1">
                @endif
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2" for="role">{{ __('static.status') }}</label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                @if (isset($service_package))
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        {{ $service_package->status ? 'checked' : '' }}>
                @else
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        checked>
                @endif
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>
@push('js')
    <script src="{{ asset('admin/js/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/js/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('admin/js/custom-ai/ai-content-generation.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#servicepackageForm").validate({
                    ignore: [],
                    rules: {
                        "title": "required",
                        "start_end_date": "required",
                        "price": "required",
                        "discount": "required",
                        "bg_color": "required",
                        "image[]": {
                            accept: "image/jpeg, image/png"
                        },
                        "hexa_code": "required",
                        "zone_id[]": "required",
                        "serviceman_id[]": "required",
                    }
                });

                // Handle zone change
                $('select[name="zone_id[]"]').on('change', function() {
                    var zoneIDs = $(this).val();
                    loadServicemen(zoneIDs);
                    loadServices(zoneIDs);
                });

                @if(isset($service_package))
                    var initialZones = {!! json_encode($service_package->zones->pluck('id')->toArray()) !!};
                    var initialServicemen = {!! json_encode($service_package->servicemen->pluck('id')->toArray()) !!};
                    var initialServices = {!! json_encode($service_package->services->pluck('id')->toArray() ?? []) !!};
                    
                    if (initialZones && initialZones.length > 0) {
                         loadServicemen(initialZones, initialServicemen);
                         loadServices(initialZones, initialServices);
                    }
                @endif




                const colorInput = $('#hexa_code');
                const colorPickerSpan = $('.color-picker');

                // Initialize span with the initial color input value
                colorPickerSpan.text(colorInput.val());

                // Update span text content when the color input value changes
                colorInput.on('input', function() {
                    colorPickerSpan.text($(this).val());
                });
            });
            // Function to load services based on the selected zones
            function loadServices(zoneIDs, selectedServices) {
                let url = "{{ route('backend.get-zone-services') }}";

                if (zoneIDs && zoneIDs.length > 0) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            zone_ids: zoneIDs,
                        },
                        success: function(data) {
                            console.log("Services loaded:", data);
                            $('#services').empty();

                            let selectAllOption = new Option("Select All", "all");
                            $('#services').append(selectAllOption);

                            let currentSelected = selectedServices || [];
                            console.log("Previously selected services:", currentSelected);

                            $.each(data, function(index, optionData) {
                                var isSelected = currentSelected.some(id => String(id) === String(optionData.id));
                                var option = new Option(optionData.title, optionData.id, isSelected, isSelected);

                                if (optionData.media && optionData.media.length > 0) {
                                    var imageUrl = optionData.media[0].original_url;
                                    $(option).attr("image", imageUrl);
                                }
                                $('#services').append(option);
                            });
                            
                            $('#services').val(currentSelected).trigger('change');
                        },
                        error: function(xhr) {
                            console.error("Error loading services:", xhr.responseText);
                        }
                    });
                } else {
                    $('#services').empty().trigger('change');
                }
            }

            // Function to load servicemen based on the selected zones
            function loadServicemen(zoneIDs, selectedServicemen) {
                let url = "{{ route('backend.get-zone-servicemen') }}";

                if (zoneIDs && zoneIDs.length > 0) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            zone_ids: zoneIDs,
                        },
                        success: function(data) {
                            console.log("Servicemen loaded:", data);
                            var servicemanSelect = $('#serviceman_id');
                            var currentSelected = selectedServicemen || [];
                            console.log("Previously selected servicemen:", currentSelected);
                            
                            servicemanSelect.empty();

                            $.each(data, function(index, serviceman) {
                                var isSelected = currentSelected.some(id => String(id) === String(serviceman.id));
                                var option = new Option(serviceman.name, serviceman.id, isSelected, isSelected);
                                servicemanSelect.append(option);
                            });
                            
                            servicemanSelect.val(currentSelected).trigger('change');
                        },
                        error: function(xhr) {
                            console.error("Error loading servicemen:", xhr.responseText);
                        }
                    });
                } else {
                    $('#serviceman_id').empty().trigger('change');
                }
            }
            $('.disable-all').on('change', function() {
                const $currentSelect = $(this);
                const selectedValues = $currentSelect.val();
                const allOption = "all";

                if (selectedValues && selectedValues.includes(allOption)) {

                    $currentSelect.val([allOption]);
                    $currentSelect.find('option').not(`[value="${allOption}"]`).prop('disabled', true);
                } else {

                    $currentSelect.find('option').prop('disabled', false);
                }
            });
            function isServiceImages() {
                @if (isset($service_package?->media) && !$service_package?->media?->isEmpty())
                    return false;
                @else
                    return true;
                @endif
            }
        })(jQuery);
    </script>
@endpush
