<?php use \app\Helpers\Helpers; ?>

    <div class="form-group row">
        <label class="col-md-2" for="name"><?php echo e(__('static.language.languages')); ?></label>
        <div class="col-md-10">
            <ul class="language-list">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = \App\Helpers\Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($additionalService)): ?>
                        <li>
                            <a href="<?php echo e(route('backend.additional-service.edit', ['additional_service' => $additionalService->id, 'locale' => $lang->locale])); ?>"
                                class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>"
                                target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>"
                                    alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i
                                    data-feather="arrow-up-right"></i></a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(route('backend.additional-service.create', ['locale' => $lang->locale])); ?>"
                                class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>"
                                target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>"
                                    alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i
                                    data-feather="arrow-up-right"></i></a>
                        </li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('backend.additional-service.edit', ['additional_service' => $additionalService->id, 'locale' => Session::get('locale', 'en')])); ?>"
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
    <label class="col-md-2" for="parent_id"><?php echo e(__('static.service.services')); ?><span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control user-dropdown" id="parent_id" name="parent_id" data-placeholder="<?php echo e(__('static.additional_service.select_service')); ?>">
                <option class="select-placeholder" value=""></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <option value="<?php echo e($option->id); ?>" image="<?php echo e($option->getFirstMedia('image')?->getUrl()); ?>"
                    <?php if(old('parent_id', isset($additionalService) ? $additionalService->parent_id : '') == $option->id): ?> selected <?php endif; ?>><?php echo e($option->title); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['parent_id'];
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
    <label for="thumbnail" class="col-md-2"><?php echo e(__('static.categories.thumbnail')); ?>

        (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
    <div class="col-md-10">
        <input class="form-control" type="file" id="thumbnail" name="thumbnail">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['thumbnail'];
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($additionalService)): ?>
    <?php
        $locale = request('locale');
        $mediaItems = $additionalService->getMedia('thumbnail')->filter(function ($media) use ($locale) {
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
                                    <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>" alt="User Image"
                                        class="image-list-item">
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
    <div class="col-md-10 input-copy-box">
        <input class='form-control' type="text" id="title" name="title"
            value="<?php echo e(isset($additionalService->title) ? $additionalService->getTranslation('title', request('locale', app()->getLocale())) : old('title')); ?>"
            placeholder="<?php echo e(__('static.service.enter_title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)">
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('hasrole', 'provider')): ?>
    <input type="hidden" name="provider_id" value="<?php echo e(auth()->user()->id); ?>" id="provider_id">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="form-group row">
    <label class="col-md-2" for="duration">Duration <span>*</span></label>
    <div class="col-md-10">
        <div class="input-group mb-3 flex-nowrap">
            
            <input class="form-control" 
                   type="number" 
                   id="duration" 
                   name="duration" 
                   min="1"
                   value="<?php echo e(isset($additionalService->duration) ? $additionalService->duration : old('duration')); ?>"
                   placeholder="Enter duration">

            <select class="form-select" name="duration_unit" style="max-width: 120px;">
                <option value="minutes"
                    <?php echo e((isset($additionalService->duration_unit) && $additionalService->duration_unit == 'minutes') ? 'selected' : ''); ?>>
                    Min
                </option>
                <option value="hours"
                    <?php echo e((isset($additionalService->duration_unit) && $additionalService->duration_unit == 'hours') ? 'selected' : ''); ?>>
                    Hours
                </option>
            </select>

        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback d-block">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2" for="price"><?php echo e(__('static.service.price')); ?><span> *</span></label>
    <div class="col-md-10 error-div">
        <div class="input-group mb-3 flex-nowrap">
            <span class="input-group-text"><?php echo e(Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
            <div class="w-100">
                <input class='form-control' type="number" id="price" name="price" min="1"
                    value="<?php echo e(isset($additionalService->price) ? $additionalService->price : old('price')); ?>"
                    placeholder="<?php echo e(__('static.coupon.price')); ?>">
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
    <label class="col-md-2" for="role"><?php echo e(__('static.status')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($additionalService)): ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        <?php echo e($additionalService->status ? 'checked' : ''); ?>>
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
    <script src="<?php echo e(asset('admin/js/custom-ai/ai-content-generation.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#additionalServiceForm").validate({
                    ignore: [],
                    rules: {
                        "thumbnail": {
                            required: isServiceImage,
                        },
                        "title": "required",
                        "price": "required",
                        "parent_id": {
                            required: true
                        },
                        "duration": {
                            required: true,
                            min: 1
                        },
                        "duration_type": {
                            required: true
                        },
                    }
                });
            });

            function isServiceImage() {
                <?php if(isset($additionalService->media) && !$additionalService->media->isEmpty()): ?>
                    return false;
                <?php else: ?>
                    return true;
                <?php endif; ?>
            }
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/additional-service/fields.blade.php ENDPATH**/ ?>