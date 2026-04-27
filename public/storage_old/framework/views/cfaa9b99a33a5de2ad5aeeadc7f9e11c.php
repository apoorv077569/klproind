<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/flatpickr.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php use \app\Helpers\Helpers; ?>

    <div class="form-group row">
        <label class="col-md-2" for="name"><?php echo e(__('static.language.languages')); ?></label>
        <div class="col-md-10">
            <ul class="language-list">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = \App\Helpers\Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
                        <li>
                            <a href="<?php echo e(route('backend.service-package.edit', ['service_package' => $service_package->id, 'locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i data-feather="arrow-up-right"></i></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(route('backend.service-package.create', ['locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i data-feather="arrow-up-right"></i></a>
                        </li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('backend.service-package.edit', ['service_package' => $service_package->id, 'locale' => Session::get('locale', 'en')])); ?>" class="language-switcher active" target="blank"><img src="<?php echo e(asset('admin/images/flags/LR.png')); ?>" alt="">English<i data-feather="arrow-up-right"></i></a>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    </div>

<input type="hidden" name="locale" value="<?php echo e(request('locale')); ?>">
<div class="form-group row">
    <label for="image" class="col-md-2"><?php echo e(__('static.categories.image')); ?>

        (<?php echo e(request('locale', app()->getLocale())); ?>)</label>
    <div class="col-md-10">
        <input class='form-control' type="file" accept=".jpg, .png, .jpeg" id="image" name="image[]">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['image'];
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
    <?php
        $locale = request('locale');
        $mediaItems = $service_package->getMedia('image')->filter(function ($media) use ($locale) {
            return $media->getCustomProperty('language') === $locale;
        });
    ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mediaItems->count() > 0): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="image-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mediaItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <div class="image-list-detail">
                                <div class="position-relative">
                                    <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>"
                                        alt="Service Package Image" class="image-list-item">
                                    <div class="close-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<div class="form-group row">
    <label class="col-md-2" for="title"><?php echo e(__('static.title')); ?>

        (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
    <div class="col-md-10">
        <div class="input-copy-box">
            <input class='form-control' type="text" id="title" name="title"
                value="<?php echo e(isset($service_package) ? $service_package->getTranslation('title', request('locale', app()->getLocale())) : old('title')); ?>"
                placeholder="<?php echo e(__('static.service_package.enter_title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
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
            <!-- AI Generate Title Button -->
            <button type="button" class="btn btn-sm ai-generate-title-btn" 
                    data-url="<?php echo e(route('backend.custom-ai-model.generate-title')); ?>"
                    data-content_type="service"
                    data-locale="<?php echo e(request('locale', app()->getLocale())); ?>"
                    style="margin-left: 8px;">
                Generate Title
            </button>
        </div>
    </div>
</div>
<!-- Removed Provider Selection Fields as per user request -->


<div class="form-group row">
    <label class="col-md-2" for="zone_id"><?php echo e(__('static.zone.zones')); ?><span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <?php
            if (!isset($zones)) {
                $zones = \App\Models\Zone::where('status', '1')->get();
            }
        ?>
        <select class="select-2 form-control" id="zone_id" name="zone_id[]" search="true"
            data-placeholder="<?php echo e(__('static.service_package.select_zone')); ?>" multiple>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($zone->id); ?>"
                    <?php echo e((collect(old('zone_id', isset($service_package) ? $service_package->zones->pluck('id')->toArray() : []))->contains($zone->id)) ? 'selected' : ''); ?>>
                    <?php echo e($zone->name); ?>

                </option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['zone_id'];
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
    <label class="col-md-2" for="serviceman_id"><?php echo e(__('static.dashboard.servicemen')); ?><span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control user-dropdown" id="serviceman_id" name="serviceman_id[]" search="true"
            data-placeholder="<?php echo e(__('static.service_package.select_serviceman')); ?>" multiple>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service_package->servicemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($serviceman->id); ?>" selected>
                        <?php echo e($serviceman->name); ?>

                    </option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['serviceman_id'];
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

<div class='form-group row d-none'>
    <label class="col-md-2" for="service_id"><?php echo e(__('static.service_package.services')); ?></label>
    <div class="col-md-10 error-div select-dropdown">
        <select id="services" class="select-2 form-control user-dropdown disable-all" search="true" name="service_id[]"
            data-placeholder="<?php echo e(__('static.service_package.select_services')); ?>" multiple>
            <option value=""></option>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['service_id'];
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
    <label class="col-md-2" for="price"><?php echo e(__('static.service_package.price')); ?><span> *</span></label>
    <div class="col-md-10 error-div">
        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text"><?php echo e(Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
            <div class="w-100">
                <input class='form-control' type="number" id="price" name="price" min="1"
                    value="<?php echo e(isset($service_package->price) ? $service_package->price : old('price')); ?>"
                    placeholder="<?php echo e(__('static.service_package.enter_price')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['price'];
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
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="discount"><?php echo e(__('static.service_package.discount')); ?><span> *</span></label>
    <div class="col-md-10 error-div">
        <div class="input-group mb-3 flex-nowrap">
            <div class="w-100 percent">
                <input class='form-control' id="discount" type="number" name="discount" min="1"
                    value="<?php echo e($service_package->discount ?? old('discount')); ?>"
                    placeholder="<?php echo e(__('static.service_package.enter_discount')); ?>"
                    oninput="if (value > 100) value = 100; if (value < 0) value = 0;">
            </div>
            <span class="input-group-text">%</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['discount'];
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
</div>

<div class="form-group row">
    <label for="description" class="col-md-2"><?php echo e(__('static.service_package.description')); ?>

        (<?php echo e(request('locale', app()->getLocale())); ?>)</label>
    <div class="col-md-10">
        <div class="input-copy-box">
            <textarea class="form-control" rows="4" name="description" id="description"
                placeholder="<?php echo e(__('static.tag.enter_description')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)"
                cols="50"><?php echo e(isset($service_package) ? $service_package->getTranslation('description', request('locale', app()->getLocale())) : old('description')); ?></textarea>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
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
        <!-- AI Generate Description Button -->
        <div style="margin-top: 8px;">
            <button type="button" class="btn btn-sm ai-generate-description-btn" 
                    data-url="<?php echo e(route('backend.custom-ai-model.generate-description')); ?>"
                    data-content_type="service_package"
                    data-locale="<?php echo e(request('locale', app()->getLocale())); ?>">
                Generate Description
            </button>
        </div>
    </div>
</div>

<div class="form-group row flatpicker-calender">
    <label class="col-md-2" for="start_end_date"><?php echo e(__('static.service_package.date')); ?><span> *</span> </label>
    <div class="col-md-10">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
            <input class="form-control" id="date-range"
                value="<?php echo e(\Carbon\Carbon::parse(@$service_package->started_at)->format('d-m-Y')); ?> to <?php echo e(\Carbon\Carbon::parse(@$service_package->ended_at)->format('d-m-Y')); ?>"
                name="start_end_date" placeholder="<?php echo e(__('static.service_package.select_date')); ?>">
        <?php else: ?>
            <input class="form-control" id="date-range" name="start_end_date"
                placeholder="<?php echo e(__('static.service_package.select_date')); ?>">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['start_end_date'];
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
    <label class="col-md-2" for="bg_color"><?php echo e(__('static.service.bg_color')); ?><span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control" id="bg_color" name="bg_color"
            data-placeholder="<?php echo e(__('static.service.select_bg_color')); ?>">
            <option class="select-placeholder" value=""></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['primary', 'secondary', 'info', 'success', 'warning', 'danger']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bg_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option class="option" value="<?php echo e($bg_color); ?>"
                    <?php echo e(old('bg_color', isset($service_package) ? $service_package->bg_color : '') == $bg_color ? 'selected' : ''); ?>>
                    <?php echo e(ucfirst($bg_color)); ?>

                </option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['bg_color'];
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
    <label class="col-md-2" for="hexa_code"><?php echo e(__('static.hexa_code')); ?><span> *</span></label>
    <div class="col-md-10">
        <div class="d-flex align-items-center gap-2">
            <input class="form-control" type="color" name="hexa_code" id="hexa_code"
                value="<?php echo e(isset($service_package->hexa_code) ? $service_package->hexa_code : old('hexa_code')); ?>"
                placeholder="<?php echo e(__('static.service_package.enter_color')); ?>">
            <span class="color-picker">#000</span>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['hexa_code'];
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
    <label class="col-md-2" for="role"><?php echo e(__('static.service_package.is_featured')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id=""
                        value="1" <?php echo e($service_package->is_featured ? 'checked' : ''); ?>>
                <?php else: ?>
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id=""
                        value="1">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2" for="role"><?php echo e(__('static.status')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service_package)): ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        <?php echo e($service_package->status ? 'checked' : ''); ?>>
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
    <script src="<?php echo e(asset('admin/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom-flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom-ai/ai-content-generation.js')); ?>"></script>
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

                <?php if(isset($service_package)): ?>
                    var initialZones = <?php echo json_encode($service_package->zones->pluck('id')->toArray()); ?>;
                    var initialServicemen = <?php echo json_encode($service_package->servicemen->pluck('id')->toArray()); ?>;
                    var initialServices = <?php echo json_encode($service_package->services->pluck('id')->toArray() ?? []); ?>;
                    
                    if (initialZones && initialZones.length > 0) {
                         loadServicemen(initialZones, initialServicemen);
                         loadServices(initialZones, initialServices);
                    }
                <?php endif; ?>




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
                let url = "<?php echo e(route('backend.get-zone-services')); ?>";

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
                let url = "<?php echo e(route('backend.get-zone-servicemen')); ?>";

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
                <?php if(isset($service_package?->media) && !$service_package?->media?->isEmpty()): ?>
                    return false;
                <?php else: ?>
                    return true;
                <?php endif; ?>
            }
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/service-package/fields.blade.php ENDPATH**/ ?>