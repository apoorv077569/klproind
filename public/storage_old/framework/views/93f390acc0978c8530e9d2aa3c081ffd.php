<?php use \app\Helpers\Helpers; ?>
<?php use \App\Enums\ServiceTypeEnum; ?>
<?php
    if (isset($service->destination_location['country_id']) || old('country_id')) {
        $states = \App\Models\State::where(
            'country_id',
            old('country_id', @$service->destination_location['country_id']),
        )->get();
    } else {
        $states = [];
    }
?>
<ul class="nav nav-tabs tab-coupon" id="servicetab" role="tablist">
    <li class="nav-item">
        <a class="nav-link <?php echo e(session('active_tab') != null ? '' : 'show active'); ?>" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="" data-tab="0">
            <i data-feather="settings"></i><?php echo e(__('static.general')); ?></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="faq-tab" data-bs-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="true" data-original-title="" title="" data-tab="2">
            <i data-feather="help-circle"></i> <?php echo e(__('FAQ\'s')); ?></a>
    </li>
</ul>

<div class="tab-content" id="servicetabContent">

        <div class="form-group row">
            <label class="col-md-2" for="name"><?php echo e(__('static.language.languages')); ?></label>
            <div class="col-md-10">
                <ul class="language-list">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = \App\Helpers\Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                            <li>
                                <a href="<?php echo e(route('backend.service.edit', ['service' => $service->id, 'locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)
                                    <i data-feather="arrow-up-right"></i>
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e(route('backend.service.create', ['locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)
                                    <i data-feather="arrow-up-right"></i>
                                </a>
                            </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('backend.service.edit', ['service' => $service->id, 'locale' => Session::get('locale', 'en')])); ?>" class="language-switcher active" target="blank"><img src="<?php echo e(asset('admin/images/flags/LR.png')); ?>" alt="">English
                                <i data-feather="arrow-up-right"></i>
                            </a>
                        </li>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>
        </div>

    <div class="tab-pane fade <?php echo e(session('active_tab') != null ? '' : 'show active'); ?>" id="general" role="tabpanel" aria-labelledby="general-tab">
        <input type="hidden" name="locale" value="<?php echo e(request('locale')); ?>">
        <div class="form-group row">
            <label class="col-md-2" for="title"><?php echo e(__('static.title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
            <div class="col-md-10 input-copy-box">
                <input class='form-control' type="text" id="title" name="title" value="<?php echo e(isset($service->title) ? $service->getTranslation('title', request('locale', app()->getLocale())) : old('title')); ?>" placeholder="<?php echo e(__('static.service.enter_title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)">
                <button class="btn ai-generate-btn" id="generateTitle" data-url="<?php echo e(route('backend.custom-ai-model.generate-title')); ?>" data-locale="<?php echo e(request('locale', app()->getLocale())); ?>">generate title</button>
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
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="zone_id"><?php echo e(__('static.service.zone')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <select class="select-2 form-control" id="zone_id" name="zone_id[]" multiple data-placeholder="<?php echo e(__('static.service.select_zone')); ?>">
                    <option value="selectAll"><?php echo e(__('static.selectAll') ?? 'Select All'); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e($key); ?>"
                             <?php if(!empty($selected_zones) && in_array($key, $selected_zones)): ?> selected <?php elseif(old('zone_id') && in_array($key, old('zone_id'))): ?> selected <?php endif; ?>>
                            <?php echo e($option); ?>

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
                <span class="text-gray mt-1 d-block">
                   <?php echo e(__('static.zone.to_add_new_zone')); ?>

                    <a href="<?php echo e(route('backend.zone.create')); ?>" class="text-primary">
                        <b><?php echo e(__('static.zone.here')); ?></b>
                    </a>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2" for="category_id"><?php echo e(__('static.service.category')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <select id="category_id" class="select-2 form-control categories disable-all"
                    data-placeholder="<?php echo e(__('static.service.select_categories')); ?>" name="category_id[]" multiple>
                    <option value=""></option>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['category_id'];
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
            <label class="col-md-2" for="type"><?php echo e(__('static.service.type')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <select class="select-2 form-control" id="type" name="type"
                    data-placeholder="<?php echo e(__('static.service.select_type')); ?>">
                    <option class="select-placeholder" value=""></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [ServiceTypeEnum::FIXED => Helpers::formatServiceType('fixed'), ServiceTypeEnum::PROVIDER_SITE => 'Provider Site', ServiceTypeEnum::REMOTELY => 'Remotely', ServiceTypeEnum::SCHEDULED => 'Scheduled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option class="option" value="<?php echo e($key); ?>"
                            <?php if(old('type', isset($service) ? $service->type : '') == $key): ?> selected <?php endif; ?>><?php echo e($option); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['type'];
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


        <div class="form-group row d-none" id="address_id_wrapper">
            <label class="col-md-2" for="address_id"><?php echo e(__('Address')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <select class="select-2 form-control" id="address_id" name="address_id" data-placeholder="Select address">
                    <option class="select-placeholder" value=""></option>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['address_id'];
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

        <!--<div class="form-group row">
            <label class="col-md-2" for="required_servicemen"><?php echo e(__('static.service.required_servicemen')); ?><span>*</span></label>
            <div class="col-md-10">
                <input class='form-control' type="number" id="required_servicemen" name="required_servicemen" value="<?php echo e(old('required_servicemen', $service->required_servicemen ?? '0')); ?>" placeholder="<?php echo e(__('static.service.enter_required_servicemen')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['required_servicemen'];
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
        </div>-->

        <div class="form-group row">
            <label class="col-md-2" for="price"><?php echo e(__('static.service.price')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text"><?php echo e(Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                    <div class="w-100">
                        <input class='form-control' type="number" id="price" name="price" min="1"
                            value="<?php echo e(isset($service->price) ? $service->price : old('price')); ?>"
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
            <label class="col-md-2" for="discount"><?php echo e(__('static.service.discount')); ?></label>
            <div class="col-md-10 error-div">
                <div class="input-group mb-3 flex-nowrap">
                    <div class="w-100 percent">
                        <input class='form-control' id="discount" type="number" name="discount" min="0" value="<?php echo e($service->discount ?? old('discount')); ?>" placeholder="<?php echo e(__('static.service.enter_discount')); ?>" oninput="if (value > 100) value = 100; if (value < 0) value = 0;">
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
            <label class="col-md-2" for="service_rate"><?php echo e(__('static.service.service_rate')); ?></label>
            <div class="col-md-10">
                <input class='form-control' type="number" id="service_rate" name="service_rate" value="<?php echo e(isset($service->service_rate) ? $service->service_rate : old('service_rate')); ?>" placeholder="<?php echo e(__('static.service.service_rate')); ?>" readonly>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['service_rate'];
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

        <input type="hidden" name="per_serviceman_commission" id="per_serviceman_commission" value="<?php echo e(isset($service->per_serviceman_commission) ? $service->per_serviceman_commission : 0); ?>">

        <div class="form-group row">
            <label class="col-md-2" for="is_advance_payment_enabled"><?php echo e(__('static.service.is_advance_payment_enabled')); ?></label>
            <div class="col-md-10">
                <div class="editor-space">
                    <label class="switch">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                            <input class="form-control" type="hidden" name="is_advance_payment_enabled" value="0">
                            <input class="form-check-input" type="checkbox" name="is_advance_payment_enabled" id="is_advance_payment_enabled" value="1" <?php echo e(old('is_advance_payment_enabled', $service->is_advance_payment_enabled ?? false) ? 'checked' : ''); ?>>
                        <?php else: ?>
                            <input class="form-control" type="hidden" name="is_advance_payment_enabled" value="0">
                            <input class="form-check-input" type="checkbox" name="is_advance_payment_enabled" id="is_advance_payment_enabled" value="1" <?php echo e(old('is_advance_payment_enabled', false) ? 'checked' : ''); ?>>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row" id="advance_payment_percentage_container" style="<?php echo e(old('is_advance_payment_enabled', isset($service) && $service->is_advance_payment_enabled ? true : false) ? '' : 'display: none;'); ?>">
            <label class="col-md-2" for="advance_payment_percentage"><?php echo e(__('static.service.advance_payment_percentage')); ?><span> *</span></label>
            <div class="col-md-10 error-div">
                <div class="input-group mb-3 flex-nowrap">
                    <div class="w-100 percent">
                        <input class='form-control' id="advance_payment_percentage" type="number" name="advance_payment_percentage" min="0" max="100" step="0.01" value="<?php echo e(isset($service->advance_payment_percentage) ? $service->advance_payment_percentage : old('advance_payment_percentage')); ?>" placeholder="<?php echo e(__('static.service.enter_advance_payment_percentage')); ?>" oninput="if (value > 100) value = 100; if (value < 0) value = 0;">
                    </div>
                    <span class="input-group-text">%</span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['advance_payment_percentage'];
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
            <label class="col-md-2" for="tax_id"><?php echo e(__('static.service.taxes')); ?></label>
            <div class="col-md-10 error-div disable-select">
                <select class="select-2 form-control tax_id" id="tax_id[]" name="tax_id[]" data-placeholder="<?php echo e(__('static.service.select_tax')); ?>" multiple>
                    <option class="select-placeholder" value=""></option>

                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['tax_id'];
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
            <label class="col-md-2" for="duration"><?php echo e(__('static.service.duration')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="number" min="1" name="duration" id="duration" value="<?php echo e(isset($service->duration) ? $service->duration : old('duration')); ?>" placeholder="<?php echo e(__('static.service.enter_duration')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['duration'];
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
            <label class="col-md-2" for="duration_unit"><?php echo e(__('static.service.duration_unit')); ?><span>
                    *</span></label>
            <div class="col-md-10 error-div">
                <select class="select-2 form-control" id="duration_unit" name="duration_unit" data-placeholder="<?php echo e(__('static.service.select_duration_unit')); ?>">
                    <option class="select-placeholder" value=""></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['hours' => 'Hours', 'minutes' => 'Minutes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option class="option" value="<?php echo e($key); ?>"
                            <?php if(old('duration_unit', $service->duration_unit ?? '') === $key): ?> selected <?php endif; ?>><?php echo e($option); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['duration_unit'];
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
            <label class="col-md-2" for="video"><?php echo e(__('static.video')); ?>

                (<?php echo e(request('locale', app()->getLocale())); ?>)</label>
            <div class="col-md-10 input-copy-box">
                <input class='form-control' type="text" id="video" name="video" value="<?php echo e(isset($service->video) ? $service->getTranslation('video', request('locale', app()->getLocale())) : old('video')); ?>" placeholder="<?php echo e(__('static.service.enter_video')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['video'];
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
            <?php
                $locale = request('locale');
                $mediaItems = $service->getMedia('thumbnail')->filter(function ($media) use ($locale) {
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
                                            <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>" alt="Service App Thumbnail" class="image-list-item">
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
            <label for="image" class="col-md-2"><?php echo e(__('static.categories.image')); ?>

                (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="file" id="image[]" name="image[]" multiple>
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
            <?php
                $locale = request('locale');
                $mediaItems = $service->getMedia('image')->filter(function ($media) use ($locale) {
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
                                            <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>" alt="User Image" class="image-list-item">
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
            <label for="web_thumbnail" class="col-md-2"><?php echo e(__('static.categories.web_thumbnail')); ?>

                (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="file" id="web_thumbnail" name="web_thumbnail">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['web_thumbnail'];
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
            <?php
                $locale = request('locale');
                $mediaItems = $service->getMedia('web_thumbnail')->filter(function ($media) use ($locale) {
                    return $media->getCustomProperty('language') === $locale;
                });
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mediaItems->count() > 0): ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="image-list">
                                <div class="image-list-detail">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mediaItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <div class="position-relative">
                                            <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>" alt="User Image" class="image-list-item">
                                            <div class="close-icon">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="form-group row">
            <label for="web_images" class="col-md-2"><?php echo e(__('static.categories.web_images')); ?>(<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="file" id="web_images" name="web_images[]" multiple>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['web_images'];
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
            <?php
                $locale = request('locale');
                $mediaItems = $service->getMedia('web_images')->filter(function ($media) use ($locale) {
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
                                                alt="User Image" class="image-list-item">
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
            <label for="image" class="col-md-2"><?php echo e(__('static.page.content')); ?>

                (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
            <div class="col-md-10">
                <div class="input-copy-box">
                    <textarea class="summary-ckeditor" id="content" name="content" cols="65" rows="5"><?php echo e(isset($service->content) ? $service->getTranslation('content', request('locale', app()->getLocale())) : old('content')); ?></textarea>
                    <button class="btn ai-generate-content-btn" id="generateContent" data-url="<?php echo e(route('backend.custom-ai-model.generate-content')); ?>" data-content_type="service" data-locale="<?php echo e(request('locale', app()->getLocale())); ?>">generate content</button>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['content'];
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
            <label class="col-md-2" for="role"><?php echo e(__('static.service.is_random_related_services')); ?></label>
            <div class="col-md-10">
                <div class="editor-space">
                    <label class="switch">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                            <input class="form-control" type="hidden" name="is_random_related_services" value="0">
                            <input class="form-check-input" id="is_related" type="checkbox" name="is_random_related_services" id="" value="1" <?php echo e($service->is_random_related_services ? 'checked' : ''); ?>>
                        <?php else: ?>
                            <input class="form-control" type="hidden" name="is_random_related_services" value="0">
                            <input class="form-check-input" id="is_related" type="checkbox" name="is_random_related_services" id="" value="1">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row services" <?php if(isset($service) && $service->is_random_related_services): ?> style="display:none" <?php endif; ?>>
            <label class="col-md-2" for="service_id"><?php echo e(__('static.service.related_services')); ?> <span>
                    *</span></label>
            <div class="col-md-10 error-div select-dropdown">
                <select id="related_services" class="select-2 form-control user-dropdown" search="true" name="service_id[]" data-placeholder="<?php echo e(__('static.service.select_related_services')); ?>" multiple>
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
            <label class="col-md-2" for="is_featured"><?php echo e(__('static.service.is_featured')); ?></label>
            <div class="col-md-10">
                <div class="editor-space">
                    <label class="switch">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                            <input class="form-control" type="hidden" name="is_featured" value="0">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1"
                                <?php echo e($service->is_featured ? 'checked' : ''); ?>>
                        <?php else: ?>
                            <input class="form-control" type="hidden" name="is_featured" value="0">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="status"><?php echo e(__('static.status')); ?></label>
            <div class="col-md-10">
                <div class="editor-space">
                    <label class="switch">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                            <input class="form-control" type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1" <?php echo e($service->status ? 'checked' : ''); ?>>
                        <?php else: ?>
                            <input class="form-control" type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="nextBtn btn btn-primary"><?php echo e(__('static.next')); ?></button>
        </div>
    </div>

    <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
        <div class="d-flex justify-content-end position-relative faq-generate-box">
            <button type="button"
                    class="btn ai-generate-faq-btn faq-generate"
                    data-url="<?php echo e(route('backend.custom-ai-model.generate-faq')); ?>"
                    data-locale="<?php echo e(request('locale', app()->getLocale())); ?>">
                <?php echo e(__('static.service.generate_faqs') ?? 'Generate FAQs'); ?>

            </button>
        </div>
        <div class="faq-container mb-2">
            <?php if(isset($service) && !$service->faqs->isEmpty()): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="faqs-structure mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-11 col-sm-10 col-12">
                                <div class="form-group row">
                                    <label class="col-md-2"
                                        for="faqs[<?php echo e($index); ?>][question]"><?php echo e(__('static.service.question')); ?>

                                        (<?php echo e(request('locale', app()->getLocale())); ?>)
                                    </label>
                                    <div class="col-md-10 input-copy-box">
                                        <input class="form-control" type="text" name="faqs[<?php echo e($index); ?>][question]" id="faqs[<?php echo e($index); ?>][question]" placeholder="<?php echo e(__('static.service.enter_question')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)" value="<?php echo e($faq->getTranslation('question', request('locale', app()->getLocale()))); ?>">
                                        <!-- Copy Icon -->
                                        <span class="input-copy-icon" data-tooltip="Copy">
                                            <i data-feather="copy"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" name="faqs[<?php echo e($index); ?>][id]" value="<?php echo e($faq['id']); ?>">
                                <div class="form-group row">
                                    <label class="col-md-2" for="faqs[<?php echo e($index); ?>][answer]"><?php echo e(__('static.service.answer')); ?>(<?php echo e(request('locale', app()->getLocale())); ?>)</label>
                                    <div class="col-md-10 input-copy-box">
                                        <textarea class="form-control" name="faqs[<?php echo e($index); ?>][answer]" id="faqs[<?php echo e($index); ?>][answer]" placeholder="<?php echo e(__('static.service.enter_answer')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)" cols="30" rows="5"><?php echo e($faq->getTranslation('answer', request('locale', app()->getLocale()))); ?></textarea>
                                        <!-- Copy Icon -->
                                        <span class="input-copy-icon" data-tooltip="Copy">
                                            <i data-feather="copy"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-2 col-12">
                                <div class="remove-faq mt-4">
                                    <i data-feather="trash-2" class="text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php else: ?>
                <div class="faqs-structure faq-page mb-4">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-md-2" for="faqs[0][question]"><?php echo e(__('static.service.question')); ?></label>
                                <div class="col-md-10">
                                    <input class="form-control faq-input" type="text" name="faqs[0][question]" id="faqs[0][question]" value="<?php echo e(old('faqs[0][question]')); ?>" placeholder="<?php echo e(__('static.service.enter_question')); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="faqs[0][answer]"><?php echo e(__('static.service.answer')); ?></label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="faqs[0][answer]" id="faqs[0][answer]" placeholder="<?php echo e(__('static.service.enter_answer')); ?>" cols="30" rows="5"><?php echo e(old('faqs[0][answer]')); ?></textarea>
                                </div>
                                <div class="col-md-1">
                                    <div class="remove-faq mt-4">
                                        <i data-feather="trash-2" class="text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="col-md-11 col-10">
            <div class="form-group row mt-4">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                    <button type="button" id="add-faq" class="btn btn-secondary add-faq"><?php echo e(__('static.service.add_faq')); ?></button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="previousBtn btn cancel"><?php echo e(__('static.previous')); ?></button>
            <button class="btn btn-primary submitBtn spinner-btn" type="submit"><?php echo e(__('static.submit')); ?></button>
        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('app.google_map_api_key')); ?>&libraries=places"></script>
    <script src="<?php echo e(asset('admin/js/custom-ai/ai-content-generation.js')); ?>"></script>
    <script>
        (function($) {

            "use strict";
            $(document).ready(function() {

                // ========== ADD THIS CODE TO FIX SELECT2 SEARCH INPUT FIELD NOT CLICKABLE ==========

                // Fix for Select2 search input not clickable in modals
                $(document).on('select2:open', function(e) {
                    const dropdown = $('.select2-container--open');
                    dropdown.css('z-index', 9999);
                });

                // Initialize all Select2 dropdowns with proper configuration
                $('.select-2').each(function() {
                    $(this).select2({
                        dropdownParent: $(this).closest('.modal').length ? $(this).closest('.modal') : document.body
                    });
                });

                // Reinitialize when modals are shown to fix z-index issues
                $('.modal').on('shown.bs.modal', function() {
                    $(this).find('.select-2').select2({
                        dropdownParent: $(this)
                    });
                });

                // ========== END OF SELECT2 FIX CODE ==========


                const typeSelect = $('#type');
                const addressWrapper = $('#address_id_wrapper');
                const addressSelect = $('#address_id');
                const addressTab = $('#address_tab');
                const editAddressTab = $('#edit_address_tab');

                function toggleTabs() {
                    const isCreateRoute = window.location.pathname === '/backend/service/create';
                    const isProviderSite = typeSelect.val() === "<?php echo e(ServiceTypeEnum::PROVIDER_SITE); ?>";
                    if (isProviderSite) {
                        addressWrapper.removeClass('d-none');
                        const providerId = $('#user_id').val() || $('select#user_id').val();
                        loadProviderAddresses(providerId);
                    } else {
                        addressWrapper.addClass('d-none');
                        addressSelect.val('').trigger('change');
                    }
                    if (isProviderSite && !isCreateRoute) {
                        addressTab.addClass('d-none');
                        editAddressTab.removeClass('d-none');
                    } else {

                        editAddressTab.addClass('d-none');
                        addressTab.removeClass('d-none');
                    }
                }
                toggleTabs();
                typeSelect.on('change', toggleTabs);

                $('.user-dropdown').on('change', function(){
                    if (typeSelect.val() === "<?php echo e(ServiceTypeEnum::PROVIDER_SITE); ?>"){
                        const providerId = $(this).val();
                        loadProviderAddresses(providerId);
                    }
                });

                function loadProviderAddresses(providerId){
                    if(!providerId){
                        addressSelect.empty();
                        return;
                    }
                    const url = "<?php echo e(route('backend.get-provider-addresses', ['provider_id' => 'PROVIDER_ID'])); ?>".replace('PROVIDER_ID', providerId);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(addresses){
                            addressSelect.empty();
                            addressSelect.append('<option class="select-placeholder" value=""></option>');
                            $.each(addresses, function(_, address){
                                const text = address.address ?? 'Address #' + address.id;
                                const option = new Option(text, address.id, false, false);
                                addressSelect.append(option);
                            });
                            <?php if(isset($service)): ?>
                                addressSelect.val("<?php echo e($service->address_id ?? ''); ?>").trigger('change');
                            <?php endif; ?>
                        }
                    });
                }

                function isTabAddress() {
                    const isCreateRoute = window.location.pathname === '/backend/service/create';
                    const providerSiteType = "<?php echo e(ServiceTypeEnum::PROVIDER_SITE); ?>";

                    if (isCreateRoute || typeSelect.val() !== providerSiteType) {
                        return true;
                    }
                    return false;
                }

                function isTabDestinationAddress() {
                    const isCreateRoute = window.location.pathname !== '/backend/service/create';
                    const providerSiteType = "<?php echo e(ServiceTypeEnum::PROVIDER_SITE); ?>";
                    if (isCreateRoute && typeSelect.val() === providerSiteType) {

                        return true;
                    }
                    return false;
                }

                function initializeGoogleAutocomplete() {

                    $(".autocomplete-google").each(function() {
                        var autocomplete = new google.maps.places.Autocomplete(this);


                        autocomplete.addListener("place_changed", function() {
                            var place = autocomplete.getPlace();
                            if (!place.place_id) {
                                console.log("No place details available");
                                return;
                            }

                            var placeId = place.place_id;
                            getAddressDetails(placeId);
                        });
                    });
                }

                function populateStates(countryId, state) {
                    $(".select-state").html('');
                    $.ajax({
                        url: "<?php echo e(url('/states')); ?>",
                        type: "POST",
                        data: {
                            country_id: countryId,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $.each(result.states, function(key, value) {

                                console.log(key, value, "TEAXUDI")
                                $('.select-state').append(
                                    `<option value="${value.id}" ${value.id === state ? 'selected' : ''}>${value.name}</option>`
                                );
                            });
                            console.log(result,defaultStateId)
                            var defaultStateId = $(".select-state").data("default-state-id");
                            if (defaultStateId !== '') {
                                $('.select-state').val(defaultStateId);
                            }
                        }
                    });
                }

                function getAddressDetails(placeId) {
                    $.ajax({
                        url: "/backend/google-address",
                        type: 'GET',
                        dataType: "json",
                        data: {
                            placeId: placeId,
                        },
                        success: function(data) {
                            console.log("address data", data.location)
                            $('#latitude').val(data.location.lat);
                            $('#longitude').val(data.location.lng);
                            $('#lat').val(data.location.lat);
                            $('#lng').val(data.location.lng);

                            $('#city').val(data.locality);
                            $('#postal_code').val(data.postal_code);
                            $('#postal_code').val(data.postal_code);
                            var street = '';
                            if (data.streetNumber) {
                                street += data.streetNumber + ", ";
                            }

                            if (data.streetName) {
                                street += data.streetName + ", ";
                            }
                            $('#street_address_1').val(street);
                            $('#area').val(data.area);
                            var countryId = data.country_id;
                            if (countryId) {
                                $('#country_id').val(countryId).trigger('change');
                            }

                            var stateId = data.state_id;
                            if (stateId) {
                                console.log("called");
                                $('.select-state').attr('data-default-state-id', stateId);
                                $('.select-state').val(stateId).trigger('change');
                                populateStates(countryId, stateId);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("AJAX error in getAddressDetails:", textStatus,
                                errorThrown);
                        }
                    });
                }

                initializeGoogleAutocomplete();


                $("#serviceForm").validate({
                    ignore: [],
                    rules: {
                        "title": "required",
                        "category_id[]": {
                            required: false
                        },
                        "type": "required",
                        "required_servicemen": {
                            required: false,
                            digits: true
                        },
                        "price": "required",
                        "advance_payment_percentage": {
                            required: function() {
                                const isScheduled = $('#type').val() === "<?php echo e(ServiceTypeEnum::SCHEDULED); ?>";
                                return !isScheduled && $('#is_advance_payment_enabled').prop('checked');
                            }
                        },
                        "duration": "required",
                        "duration_unit": "required",
                        "image[]": {
                            required: isServiceImage,
                        },
                        "thumbnail": {
                            required: isServiceImage,
                        },
                        "service_id[]": {
                            required: isServiceRelated
                        },
                        "country_id": {
                            required: isTabAddress
                        },
                        "state_id": {
                            required: isTabAddress
                        },
                        "postal_code": {
                            required: isTabAddress
                        },
                        "city": {
                            required: isTabAddress
                        },
                        "address": {
                            required: isTabAddress
                        },
                        "destination[country_id]": {
                            required: isTabDestinationAddress
                        },
                        "destination[state_id]": {
                            required: isTabDestinationAddress
                        },
                        "destination[postal_code]": {
                            required: isTabDestinationAddress
                        },
                        "destination[city]": {
                            required: isTabDestinationAddress
                        },
                        "destination[area]": {
                            required: isTabDestinationAddress
                        },
                        "destination[address]": {
                            required: isTabDestinationAddress
                        },
                    },
                    messages: {
                        "image[]": {
                            accept: "Only JPEG and PNG files are allowed.",
                        },
                    }
                });
                $('#add-faq').unbind().click(function() {
                    var allInputsFilled = true;

                    $('.faqs-structure').find('.form-group.row').each(function() {
                        var question = $(this).find('input[name^="faqs"]').val()?.trim();
                        var answer = $(this).find('input[name^="faqs"]').val()?.trim();

                        if (question === '' || answer === '') {
                            allInputsFilled = false;
                            $(this).find('input[name^="faqs"]').addClass('is-invalid');
                            $(this).find('input[name^="faqs"]').removeClass('is-valid');
                        } else {
                            $(this).find('input[name^="faqs"]').removeClass('is-invalid');
                        }

                    });


                    if (!allInputsFilled) {
                        return;
                    }

                    var inputGroup = $('.faqs-structure').last().clone();
                    var newIndex = $('.faqs-structure').length;

                    inputGroup.find('input[name^="faqs"]').each(function() {
                        var oldName = $(this).attr('name');
                        var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                        $(this).attr('name', newName).val('');
                    });

                    inputGroup.find('textarea[name^="faqs"]').each(function() {
                        var oldName = $(this).attr('name');
                        var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                        $(this).attr('name', newName).val('');
                    });

                    $(".faq-container").append(inputGroup);

                });

                $(document).on('click', '.remove-faq', function() {
                    $(this).closest('.faqs-structure').remove();
                });

                $('#price, #discount').on('input', updateServiceRate);
                updateServiceRate();

                $('select[name="type"]').on('change', function(e) {
                    var selectedType = $(this).val();
                });

                $(document).on('change', '#is_related', function(e) {
                    let status = $(this).prop('checked') == true ? 1 : 0;
                    if (status == true) {
                        $('.services').hide();
                    } else {
                        $('.services').show();
                    }
                });

                // Toggle advance payment percentage field
                $(document).on('change', '#is_advance_payment_enabled', function(e) {
                    let isEnabled = $(this).prop('checked') == true;
                    if (isEnabled) {
                        $('#advance_payment_percentage_container').show();
                        $('#advance_payment_percentage').attr('required', true);
                    } else {
                        $('#advance_payment_percentage_container').hide();
                        $('#advance_payment_percentage').removeAttr('required').val('');
                    }
                });

                // Hide advance payment fields when service type is scheduled
                function toggleAdvancePaymentFields() {
                    const selectedType = $('#type').val();
                    const isScheduled = selectedType === "<?php echo e(ServiceTypeEnum::SCHEDULED); ?>";
                    const advancePaymentRow = $('#is_advance_payment_enabled').closest('.form-group.row');
                    const advancePaymentPercentageRow = $('#advance_payment_percentage_container').closest('.form-group.row');

                    if (isScheduled) {
                        advancePaymentRow.hide();
                        advancePaymentPercentageRow.hide();
                        $('#is_advance_payment_enabled').prop('checked', false);
                        $('#advance_payment_percentage').removeAttr('required').val('');
                    } else {
                        advancePaymentRow.show();
                        // Show percentage field only if advance payment is enabled
                        if ($('#is_advance_payment_enabled').prop('checked')) {
                            advancePaymentPercentageRow.show();
                        }
                    }
                }

                // Call on type change
                $('#type').on('change', function() {
                    toggleAdvancePaymentFields();
                });

                // Call on page load
                toggleAdvancePaymentFields();

                var initialProviderID = $('input[name="user_id"]').val() || $('select[name="user_id"]').val();
                var initialZoneID = $('#zone_id').val();

                if (initialProviderID || (initialZoneID && initialZoneID.length > 0)) {
                    loadServices(initialProviderID, initialZoneID);
                }
                <?php if(isset($service)): ?>
                    var selectedServices = <?php echo json_encode($service->related_services->where('id', '!=', $service->id)->pluck('id')->toArray() ?? []); ?>;
                    setTimeout(() => { loadServices(initialProviderID, initialZoneID, selectedServices); }, 500);
                <?php endif; ?>

                $('select[name="user_id"]').on('change', function() {
                    var providerID = $(this).val();
                    var zoneID = $('#zone_id').val();
                    loadServices(providerID, zoneID);
                });

                function loadServices(providerID, zoneID, selectedServices) {

                    let url = "<?php echo e(route('backend.get-provider-services', '')); ?>";
                    if (providerID || (zoneID && zoneID.length > 0)) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            data: {
                                provider_id: providerID,
                                zone_id: zoneID
                            },
                            success: function(data) {
                                $('#related_services').empty();
                                $.each(data, function(id, optionData) {
                                    var option = new Option(optionData.title, optionData
                                        .id);
                                    if (optionData.media.length > 0) {
                                        var imageUrl = optionData.media[0].original_url
                                        $(option).attr("image", imageUrl);
                                    }

                                    if (selectedServices && selectedServices.includes(
                                            String(optionData.id))) {
                                        $(option).prop("selected", true);
                                    }

                                    $('#related_services').append(option);
                                });

                                $('#related_services').val(selectedServices).trigger('change');
                            },
                        });
                    }
                }

                setTimeout(function () {
                    var initialZoneID = $('#zone_id').val();

                    <?php if(isset($service)): ?>
                        var selectedCategories = <?php echo json_encode($service->categories->pluck('id')->toArray()); ?>;
                    <?php else: ?>
                        var selectedCategories = [];
                    <?php endif; ?>

                    <?php if(isset($service)): ?>
                        var selectedTaxes = <?php echo json_encode($service->taxes->pluck('id')->map(fn($id) => (int) $id)->toArray()); ?>;
                    <?php else: ?>
                        var selectedTaxes = [];
                    <?php endif; ?>

                    loadCategories(initialZoneID || '', selectedCategories);
                    loadTaxes(initialZoneID || '', selectedTaxes);
                }, 500);

            $('select[name="zone_id"]').on('change', function() {
                var zoneId = $(this).val();
                var providerID = $('input[name="user_id"]').val() || $('select[name="user_id"]').val();
                loadServices(providerID, zoneId);

                loadCategories(zoneId);
                loadTaxes(zoneId);
            });

            function loadCategories(zoneId, selectedCategories = []) {
                let url = "<?php echo e(route('backend.get-zone-categories')); ?>";

                let zoneData = Array.isArray(zoneId) ? zoneId : [zoneId];

                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        zone_id: zoneData,
                    },
                    success: function(data) {
                        $('#category_id').empty();

                        $.each(data, function(id, optionData) {
                            var option = new Option(optionData, id);
                            if (selectedCategories && (selectedCategories.includes(parseInt(id)) || selectedCategories.includes(id.toString()))) {
                                $(option).prop("selected", true);
                            }
                            $('#category_id').append(option);
                        });

                        $('#category_id').val(selectedCategories).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }

                function loadTaxes(zoneID, selectedTaxes = []) {
                    let url = "<?php echo e(route('backend.get-zone-taxes')); ?>";

                    $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            zone_id: zoneID,
                        },
                        success: function(data) {
                            let $taxSelect = $('.tax_id');
                            $taxSelect.empty();

                            $.each(data, function(index, tax) {
                                let isSelected = selectedTaxes.length > 0
                                    ? selectedTaxes.includes(tax.id)
                                    : true; // default to select all if not specified

                                let option = new Option(tax.name, tax.id, isSelected, isSelected);
                                $taxSelect.append(option);
                            });

                            // Always set the values and trigger change
                            const autoSelected = selectedTaxes.length > 0
                                ? selectedTaxes
                                : data.map(t => t.id);

                            $taxSelect.val(autoSelected).trigger('change');

                            // Disable the dropdown to make it read-only
                            $taxSelect.prop('disabled', true);

                            console.log("Taxes loaded and dropdown disabled.");
                        },
                        error: function(xhr, status, error) {
                            console.error("Error loading taxes:", error);
                        }
                    });
                }
            });
        })(jQuery);

        function updateServiceRate() {
            var price = parseFloat($('#price').val()) || 0;
            var discount = parseFloat($('#discount').val()) || 0;
            var serviceRate = price - (price * (discount / 100));
            $('#service_rate').val(serviceRate.toFixed(2));
        }

        function isServiceImage() {
            <?php if(isset($service->media) && !$service->media->isEmpty()): ?>
                return false;
            <?php else: ?>
                return true;
            <?php endif; ?>
        }

        function isProvider() {
            <?php if(auth()->user()->hasrole('provider')): ?>
                return false;
            <?php else: ?>
                return true;
            <?php endif; ?>
        }

        function isServiceRelated() {
            return $('#is_related').prop('checked') ? false : true;
        }

        $('.disable-all').on('change', function() {
                const $currentSelect = $(this);
                const selectedValues = $currentSelect.val();
                const allOption = "selectAll";

                if (selectedValues && selectedValues.includes(allOption)) {

                    $currentSelect.val([allOption]);
                    $currentSelect.find('option').not(`[value="${allOption}"]`).prop('disabled', true);
                } else {

                    $currentSelect.find('option').prop('disabled', false);
                }
            });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/service/fields.blade.php ENDPATH**/ ?>