<?php use \app\Helpers\Helpers; ?>
<?php
    $settings = Helpers::getSettings();
    $payment_methods = Helpers::getPaymentMethodConfigs();
    $map_key = Helpers::decryptKey($settings['firebase']['google_map_api_key'] ?? config('app.google_map_api_key'));
?>

<div class="form-group row">
    <label class="col-md-2" for="name"><?php echo e(__('static.language.languages')); ?></label>
    <div class="col-md-10">
        <ul class="language-list">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = \App\Helpers\Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($zone)): ?>
                    <li>
                        <a href="<?php echo e(route('backend.zone.edit', ['zone' => $zone->id, 'locale' => $lang->locale])); ?>"
                            class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>"
                            target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>"
                                alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i
                                data-feather="arrow-up-right"></i></a>
                    </li>
                <?php else: ?>
                <a href="<?php echo e(route('backend.zone.create', ['locale' => $lang->locale])); ?>"
                            class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>"
                            target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>"
                                alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i
                                data-feather="arrow-up-right"></i></a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <li>
                    <a href="<?php echo e(route('backend.zone.edit', ['zone' => $zone->id, 'locale' => Session::get('locale', 'en')])); ?>"
                        class="language-switcher active" target="blank"><img
                            src="<?php echo e(asset('admin/images/flags/LR.png')); ?>" alt="">English<i
                            data-feather="arrow-up-right"></i></a>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </div>
</div>

<input type="hidden" name="locale" value="<?php echo e(request('locale')); ?>">
<div class="form-group row">
    <label class="col-md-2" for="name"><?php echo e(__('static.zone.name')); ?>

        (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
    <div class="col-md-10 input-copy-box">
        <input class="form-control" type="text" id="name" name="name"
            placeholder="<?php echo e(__('static.zone.enter_name')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)"
            value="<?php echo e(isset($zone->name) ? $zone->getTranslation('name', request('locale', app()->getLocale())) : old('name')); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback d-block" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!-- Copy Icon -->
        <span class="input-copy-icon" data-tooltip="Copy">
            <i data-feather="copy"></i>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="country"
        class="col-md-2"><?php echo e(__('static.settings.currency')); ?><span>
            *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control select-country"
            id="currency_id" name="currency_id"
            data-placeholder="<?php echo e(__('static.settings.select_currency')); ?>">
            <option class="select-placeholder" value=""></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option class="option" value=<?php echo e($key); ?> <?php if(@$zone?->currency_id ?? old('currency_id')): ?> <?php if($key == @$zone?->currency_id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($option); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <option value="" disabled></option>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="payment_methods"><?php echo e(__('static.zone.payment_methods')); ?><span> *</span> </label>
    <div class="col-md-10 error-div select-dropdown">
        <select id="blog_payment_methods" class="select-2 form-control" id="payment_methods[]" search="true" name="payment_methods[]"
            data-placeholder="<?php echo e(__('static.zone.select_payment_methods')); ?>" multiple>
            <option></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option value="<?php echo e($value['slug']); ?>"
                    <?php echo e((is_array(old('payment_methods')) && in_array($key, old('payment_methods'))) || (isset($zone?->payment_methods) && in_array($value['slug'], $zone?->payment_methods)) ? 'selected' : ''); ?>>
                    <?php echo e($value['name']); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['payment_methods.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback d-block" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for=""><?php echo e(__('static.zone.place_points')); ?><span> *</span></label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="place_points" name="place_points"
            placeholder="<?php echo e(__('static.zone.select_place_points')); ?>"
            value="<?php echo e(isset($zone->locations) ? json_encode($zone->locations, true) : old('place_points')); ?>" readonly>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['place_points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback d-block" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="search-box"><?php echo e(__('static.zone.search_location')); ?></label>
    <div class="col-md-10 position-relative">
        <input id="search-box" class="form-control" type="text"
            placeholder="<?php echo e(__('static.zone.search_locations')); ?>" autocomplete="off">
        <ul id="search-suggestions" class="list-group position-absolute w-100" style="z-index: 1050; display: none; max-height: 250px; overflow-y: auto; left: 0; right: 0; padding: 0 15px; margin-top: 5px;"></ul>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="role"><?php echo e(__('static.zone.map')); ?></label>
    <div class="col-md-10">
        <div class="map-warper dark-support rounded overflow-hidden">
            <div class="map-container" id="map-container"></div>
        </div>
        <div id="coords"></div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="role"><?php echo e(__('static.status')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($zone)): ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        <?php echo e($zone->status ? 'checked' : ''); ?>>
                <?php else: ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        checked>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
    <script>
        (function($) {
            "use strict";
            let mapInstance, shapeManager, currentShape = null;
            let existingPolygon = <?php echo json_encode(isset($zone->locations) ? $zone->locations : null, 15, 512) ?>;

            window.initMap = function() {
                setupMap();
                setupDrawingManager();
                setupGeolocation();
                loadExistingPolygon();
                searchBox();
            }

            function setupMap() {
                const startLocation = {
                    lat: 21.20764938296402,
                    lng: 72.77381805168456
                };
                const mapOptions = {
                    zoom: 13,
                    center: startLocation,
                    mapTypeId: "roadmap"
                };
                let mapElement = $('#map-container')[0];
                if (mapElement) {
                   mapInstance = new google.maps.Map(mapElement, mapOptions);
                }
            }

            function setupDrawingManager() {
                shapeManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYGON,
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                    },
                    polygonOptions: {
                        editable: true
                    }
                });
                shapeManager.setMap(mapInstance);
                google.maps.event.addListener(shapeManager, "overlaycomplete", handleOverlayComplete);
            }

            function setupGeolocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(centerMapOnUser);
                }
            }

            function centerMapOnUser(position) {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                if (mapInstance) {
                    mapInstance.setCenter(userLocation);
                }
            }

            function handleOverlayComplete(event) {
                if (currentShape) {
                    currentShape.setMap(null);
                }
                currentShape = event.overlay;
                currentShape.type = event.type;
                const vertices = currentShape.getPath().getArray();
                const coordinatesArray = vertices.map(vertex => {
                    return {
                        lat: vertex.lat(),
                        lng: vertex.lng()
                    };
                });

                if (coordinatesArray[0].lat !== coordinatesArray[coordinatesArray.length - 1].lat ||
                    coordinatesArray[0].lng !== coordinatesArray[coordinatesArray.length - 1].lng) {
                    coordinatesArray.push(coordinatesArray[0]);
                }

                $('#place_points').val(JSON.stringify(coordinatesArray));
            }

            function loadExistingPolygon() {
                if (existingPolygon && mapInstance) {
                    const coordinates = existingPolygon.map(coord => new google.maps.LatLng(coord.lat, coord.lng));
                    currentShape = new google.maps.Polygon({
                        paths: coordinates,
                        editable: true,
                        map: mapInstance
                    });
                    mapInstance.fitBounds(getPolygonBounds(currentShape));
                }
            }

            function getPolygonBounds(polygon) {
                const bounds = new google.maps.LatLngBounds();
                polygon.getPath().forEach(function(vertex) {
                    bounds.extend(vertex);
                });
                return bounds;
            }

            function searchBox() {
                var input = $('#search-box');
                var suggestionsList = $('#search-suggestions');
                var debounceTimer;
                var apiKey = '<?php echo e($map_key); ?>';

                if (!input.length) return;

                input.on('input', function() {
                    var query = $(this).val();
                    clearTimeout(debounceTimer);
                    
                    if (query.trim().length === 0) {
                        suggestionsList.hide().empty();
                        return;
                    }

                    debounceTimer = setTimeout(function() {
                        $.ajax({
                            url: "https://places.googleapis.com/v1/places:autocomplete",
                            type: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-Goog-Api-Key": apiKey
                            },
                            data: JSON.stringify({ input: query }),
                            success: function(response) {
                                suggestionsList.empty();
                                if (response.suggestions && response.suggestions.length > 0) {
                                    response.suggestions.forEach(function(suggestion) {
                                        var placeText = suggestion.placePrediction.text.text;
                                        var placeId = suggestion.placePrediction.placeId;
                                        
                                        var listItem = $('<li>')
                                            .addClass('list-group-item list-group-item-action')
                                            .css('cursor', 'pointer')
                                            .text(placeText)
                                            .on('click', function() {
                                                input.val(placeText);
                                                suggestionsList.hide().empty();
                                                fetchPlaceDetails(placeId);
                                            });
                                        suggestionsList.append(listItem);
                                    });
                                    suggestionsList.show();
                                } else {
                                    suggestionsList.hide();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error fetching places (v1):", error);
                            }
                        });
                    }, 500);
                });

                // Hide suggestions when clicking outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#search-box, #search-suggestions').length) {
                        suggestionsList.hide();
                    }
                });
            }

            function fetchPlaceDetails(placeId) {
                var apiKey = '<?php echo e($map_key); ?>';
                $.ajax({
                    url: "https://places.googleapis.com/v1/places/" + placeId,
                    type: "GET",
                    headers: {
                        "X-Goog-Api-Key": apiKey,
                        "X-Goog-FieldMask": "location,viewport"
                    },
                    success: function(response) {
                        if (response.location && mapInstance) {
                            var location = new google.maps.LatLng(response.location.latitude, response.location.longitude);
                            mapInstance.setCenter(location);
                            mapInstance.setZoom(15);
                            
                            if (response.viewport) {
                                var bounds = new google.maps.LatLngBounds(
                                    new google.maps.LatLng(response.viewport.low.latitude, response.viewport.low.longitude),
                                    new google.maps.LatLng(response.viewport.high.latitude, response.viewport.high.longitude)
                                );
                                mapInstance.fitBounds(bounds);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching place details (v1):", error);
                    }
                });
            }

            $(document).ready(function() {
                $("#zoneForm").validate({
                    ignore: [],
                    rules: {
                        "name": "required",
                        "place_points": "required",
                    }
                });
                
                $('#submitBtn').click(function(e) {
                    e.preventDefault();
                    if ($("#zoneForm").valid()) {
                        $("#zoneForm").submit();
                    }
                });
            });
        })(jQuery);
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($map_key); ?>&libraries=places,geometry,drawing&callback=initMap">
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/zone/fields.blade.php ENDPATH**/ ?>