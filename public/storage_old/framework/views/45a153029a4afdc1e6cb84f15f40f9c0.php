<ul class="nav nav-tabs nav-material" id="servicemanTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
            aria-controls="general" aria-selected="true" data-tab="0">
            <i data-feather="settings"></i><?php echo e(__('static.serviceman.general')); ?>

        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address"
            aria-selected="false" data-tab="1">
            <i data-feather="map-pin"></i><?php echo e(__('static.provider.address')); ?>

        </a>
    </li>
</ul>
<div class="tab-content" id="servicemanTabContent">
    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="form-group row">
            <label for="image" class="col-md-2"><?php echo e(__('static.serviceman.image')); ?></label>
            <div class="col-md-10">
                <input class="form-control" type="file" accept=".jpg, .png, .jpeg" id="image" name="image">
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($serviceman) && isset($serviceman->getFirstMedia('image')->original_url)): ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <div class="image-list">
                            <div class="image-list-detail">
                                <div class="position-relative">
                                    <img src="<?php echo e($serviceman->getFirstMedia('image')->original_url); ?>"
                                        id="<?php echo e($serviceman->getFirstMedia('image')->id); ?>" alt="User Image"
                                        class="image-list-item">
                                    <div class="close-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <div class="form-group row">
            <label class="col-md-2" for="name"><?php echo e(__('static.name')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="name" name="name"
                    value="<?php echo e(isset($serviceman->name) ? $serviceman->name : old('name')); ?>"
                    placeholder="<?php echo e(__('static.serviceman.enter_name')); ?>">
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
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="email"><?php echo e(__('static.email')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="email" id="email"
                    value="<?php echo e(isset($serviceman->email) ? $serviceman->email : old('email')); ?>"
                    placeholder="<?php echo e(__('static.serviceman.enter_email')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
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
            <label class="col-md-2" for="phone"><?php echo e(__('static.phone')); ?><span> *</span></label>
            <div class="col-md-10">
                <div class="input-group mb-3 phone-detail">
                    <div class="col-sm-1">
                        <select class="select-2 form-control select-country-code" id="select-country-code"
                            name="code" data-placeholder="">
                            <?php
                                $default = old('code', $serviceman->code ?? App\Helpers\Helpers::getDefaultCountryCode());
                            ?>
                            <option value="" selected></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = App\Helpers\Helpers::getCountryCodes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <option class="option" value="<?php echo e($option->phone_code); ?>"
                                    data-image="<?php echo e(asset('admin/images/flags/' . $option->flag)); ?>"
                                    <?php if($option->phone_code == $default): ?> selected <?php endif; ?>
                                    data-default="<?php echo e($default); ?>">+<?php echo e($option->phone_code); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['code'];
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
                    <div class="col-sm-11">
                        <input class="form-control" type="number" name="phone" id="phone"
                            value="<?php echo e(isset($serviceman->phone) ? $serviceman->phone : old('phone')); ?>" min="1"
                            placeholder="<?php echo e(__('static.serviceman.enter_phone_number')); ?>" maxlength="15" oninput="this.value = this.value.slice(0, 15);">
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
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
            <label class="col-md-2" for="zone_ids"><?php echo e(__('static.zone.name') ?? 'Zone'); ?><span> *</span></label>
            <div class="col-md-10 error-div select-dropdown">
                <select class="select-2 form-control" id="zone_ids" name="zones[]" multiple="multiple"
                    data-placeholder="<?php echo e(__('static.zone.select-zone') ?? 'Select Zones'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e($zone->id); ?>"
                            <?php if(old('zones') && in_array($zone->id, old('zones'))): ?> selected <?php elseif(isset($serviceman) && in_array($zone->id, $serviceman->zones->pluck('id')->toArray())): ?> selected <?php endif; ?>>
                            <?php echo e($zone->name); ?>

                        </option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['zones'];
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
            <label class="col-md-2" for="service_ids"><?php echo e(__('static.service.services') ?? 'Services'); ?></label>
            <div class="col-md-10 error-div select-dropdown" id="services_wrapper">
                <select class="select-2 form-control" id="service_ids" name="services[]" multiple="multiple"
                    data-placeholder="<?php echo e(__('static.service.select_services') ?? 'Select Services'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(old('services')): ?>
                        <?php
                            $oldServices = \App\Models\Service::whereIn('id', old('services'))->get();
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $oldServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($service->id); ?>" selected><?php echo e($service->title); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php elseif(isset($serviceman)): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $serviceman->expertise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($service->id); ?>" selected><?php echo e($service->title); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['services'];
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
            <label class="col-md-2" for="experience_interval"><?php echo e(__('static.provider.experience_interval')); ?><span>
                    *</span></label>
            <div class="col-md-10 error-div select-dropdown">
                <select class="select-2 form-control" id="experience_interval" name="experience_interval"
                    data-placeholder="<?php echo e(__('static.provider.select_experience_interval')); ?>">
                    <option class="select-placeholder" value=""></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['years' => 'Years', 'months' => 'Months']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option class="option" value="<?php echo e($key); ?>"
                            <?php if(old('experience_interval', isset($serviceman) ? $serviceman->experience_interval : '') == $key): ?> selected <?php endif; ?>><?php echo e($option); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['experience_interval'];
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
            <label class="col-md-2" for="experience_duration"><?php echo e(__('static.provider.experience_duration')); ?><span>
                    *</span></label>
            <div class="col-md-10">
                <input class="form-control" id="experience_duration" type="number" min="1"
                    name="experience_duration"
                    value="<?php echo e($serviceman->experience_duration ?? old('experience_duration')); ?>"
                    placeholder="<?php echo e(__('static.provider.enter_experience_duration')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['experience_duration'];
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
        <div class ='form-group row'>
            <label class="col-md-2" for="known_languages"><?php echo e(__('static.users.known_languages')); ?></label>
            <div class="col-md-10 error-div select-dropdown">
                <select id="serviceman" class="select-2 form-control language" search="true"
                    name="known_languages[]" multiple="multiple"
                    data-placeholder="<?php echo e(__('static.users.select_languages')); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option
                            value="<?php echo e($key); ?>"<?php if(old('known_languages') && in_array($key, old('known_languages'))): ?> selected="selected" <?php elseif(isset($userKnownLanguages) && in_array($key, $userKnownLanguages)): ?> selected="selected" <?php endif; ?>>
                            <?php echo e($value); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['known_languages'];
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
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Request::is('backend/serviceman/create')): ?>
            <div class="form-group row">
                <label class="col-md-2" for="password"><?php echo e(__('static.password')); ?><span> *</span></label>
                <div class="col-md-10">
                    <div class="position-relative">
                        <input class="form-control" id="password" type="password" name="password"
                            value="<?php echo e(old('password')); ?>"
                            placeholder="<?php echo e(__('static.serviceman.enter_password')); ?>">
                        <div class="toggle-password">
                            <i data-feather="eye" class="eye"></i>
                            <i data-feather="eye-off" class="eye-off"></i>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
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
                <label class="col-md-2" for="confirm_password"><?php echo e(__('static.confirm_password')); ?><span>
                        *</span></label>
                <div class="col-md-10">
                    <div class="position-relative">
                        <input class="form-control" id="confirm_password" type="password" name="confirm_password"
                            placeholder="<?php echo e(__('static.serviceman.re_enter_password')); ?>">
                        <div class="toggle-password">
                            <i data-feather="eye" class="eye"></i>
                            <i data-feather="eye-off" class="eye-off"></i>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['confirm_password'];
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

            <div class = "form-group row">
                <label for="address" class="col-md-2"><?php echo e(__('static.service.description')); ?></label>
                <div class="col-md-10">
                    <textarea class="form-control" name="description" id="description"
                        placeholder="<?php echo e(__('static.service.enter_description')); ?>" rows="4" cols="50"><?php echo e($serviceman->description ?? old('description')); ?></textarea>
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
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        <div class="form-group row">
            <label class="col-md-2" for="role"><?php echo e(__('static.serviceman.status')); ?></label>
            <div class="col-md-10">
                <div class="editor-space">
                    <label class="switch">
                        <?php if(isset($serviceman)): ?>
                            <input class="form-control" type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1"
                                <?php echo e($serviceman->status ? 'checked' : ''); ?>>
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
    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
        <?php
            $addressType = $serviceman?->primaryAddress?->type ?? old('address_type');
            $isCustomType = $addressType && $addressType !== 'home' && $addressType !== 'work';
        ?>
        <div class="form-group row">
            <label class="col-md-2" for="role"><?php echo e(__('static.address_category')); ?></label>
            <div class="col-md-10">
                <div class="form-group row d-flex align-items-center gap-sm-4 gap-3 ms-0">
                    <div class="form-check w-auto form-radio">
                        <input type="radio" name="address_type" id="home" value="home"
                            class="form-check-input me-2 category"
                            <?php echo e($addressType === 'home' || !$addressType ? 'checked' : ''); ?>>
                        <label class="form-check-label mb-0 cursor-pointer"
                            for="home"><?php echo e(__('static.home')); ?></label>
                    </div>
                    <div class="form-check w-auto form-radio">
                        <input type="radio" name="address_type" id="work" value="work"
                            class="form-check-input me-2 category"
                            <?php echo e($addressType === 'work' ? 'checked' : ''); ?>>
                        <label class="form-check-label mb-0 cursor-pointer"
                            for="work"><?php echo e(__('static.work')); ?></label>
                    </div>
                    <div class="form-check w-auto form-radio">
                        <input type="radio" name="address_type" id="other" value="other"
                            class="form-check-input me-2 category"
                            <?php echo e($isCustomType ? 'checked' : ''); ?>>
                        <label class="form-check-label mb-0 cursor-pointer"
                            for="other"><?php echo e(__('static.custom')); ?></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row" id="custom_text" style="display:none;">
            <label class="col-md-2" for="custom_text"><?php echo e(__('static.custom-text')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class='form-control' type="text" name="custom_text" id="custom_text"
            value="<?php echo e(old('address_type') == 'other' ? old('custom_text') : ($isCustomType ? ($serviceman?->primaryAddress?->type ?? old('custom_text')) : '')); ?>"
                    placeholder="<?php echo e(__('static.enter-custom-text')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['custom_text'];
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
            <label class="col-md-2" for="alternative_name"><?php echo e(__('static.address.alternative_name')); ?></label>
            <div class="col-md-10">
                <input class='form-control' type="text" name="alternative_name" id="alternative_name"
                    value="<?php echo e($serviceman?->primaryAddress?->alternative_name ?? old('alternative_name')); ?>"
                    placeholder="<?php echo e(__('static.address.enter_alternative_name')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['alternative_name'];
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
            <label class="col-md-2" for="phone"><?php echo e(__('static.address.alternative_phone')); ?></label>
            <div class="col-md-10">
                <div class="input-group mb-3 phone-detail">
                    <div class="col-sm-1">
                        <select class="select-2 form-control select-country-code" name="alternative_code"
                            data-placeholder="">
                            <?php
                                $default = old('alternative_code', $serviceman?->primaryAddress?->code ?? App\Helpers\Helpers::getDefaultCountryCode());
                            ?>
                            <option value="" selected></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = App\Helpers\Helpers::getCountryCodes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                <option class="option" value="<?php echo e($option->phone_code); ?>"
                                    data-image="<?php echo e(asset('admin/images/flags/' . $option->flag)); ?>"
                                    <?php if($option->phone_code == $default): ?> selected <?php endif; ?>
                                    data-default="old('alternative_code')">
                                    +<?php echo e($option->phone_code); ?>

                                </option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['alternative_code'];
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
                    <div class="col-sm-11">
                        <input class="form-control" type="number" name="alternative_phone" id="alternative_phone"
                            value="<?php echo e($serviceman?->primaryAddress?->alternative_phone ?? old('alternative_phone')); ?>"
                            min="1" placeholder="<?php echo e(__('static.address.enter_alternative_phone')); ?>">
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
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

        <div class = "form-group row">
            <label for="address" class="col-md-2"><?php echo e(__('static.users.address')); ?></label>
            <div class="col-md-10">
                <textarea class = "form-control autocomplete-google" id="address" placeholder="<?php echo e(__('static.users.enter_address')); ?>"
                    rows="4" name="address" cols="50"><?php echo e($serviceman?->primaryAddress?->address ?? old('address')); ?></textarea>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['address'];
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
            <label for="country" class="col-md-2"><?php echo e(__('static.users.country')); ?><span> *</span></label>
            <div class="col-md-10 error-div select-dropdown">
                <select class="select-2 form-control select-country" id="country_id" name="country_id"
                    data-placeholder="<?php echo e(__('static.users.select_country')); ?>">
                    <option class="select-placeholder" value=""></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option class="option" value=<?php echo e($key); ?>

                            <?php if(old('country_id', isset($serviceman) ? $serviceman?->primaryAddress?->country_id : '') == $key): ?> selected <?php endif; ?>><?php echo e($option); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <option value="" disabled></option>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['country_id'];
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
        <?php
            if (isset($serviceman?->primaryAddress?->country_id) || old('country_id')) {
                $states = \App\Models\State::where(
                    'country_id',
                    old('country_id', @$serviceman?->primaryAddress?->country_id),
                )->get();
            } else {
                $states = [];
            }
        ?>
        <div class="form-group row">
            <label for="country" class="col-md-2"><?php echo e(__('static.users.state')); ?><span> *</span></label>
            <div class="col-md-10 error-div select-dropdown">
                <?php
                    $default = old('state_id', @$serviceman?->primaryAddress?->state_id);
                ?>
                <select class="select-2 form-control select-state"
                    data-default-state-id="<?php echo e(old('state_id')); ?>"
                    data-placeholder="<?php echo e(__('static.users.select_state')); ?>" id="state_id" name="state_id">
                    <option value=""></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($states)): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option class="option" value=<?php echo e($state->id); ?>

                                <?php if($state->id == $default): ?> selected <?php endif; ?> data-default="<?php echo e($default); ?>">
                                <?php echo e($state->name); ?>

                            </option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['state_id'];
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
            <label class="col-md-2" for="city"><?php echo e(__('static.city')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="city" id="city"
                    value="<?php echo e($serviceman?->primaryAddress?->city ?? old('city')); ?>"
                    placeholder="<?php echo e(__('static.users.enter_city')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['city'];
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
                <label for="street_address" class="col-md-2"><?php echo e(__('static.provider.street_address')); ?></label>
                <div class="col-md-10">
                    <input type="text" class="form-control ui-widget" id="street_address_1"
                        name="street_address" placeholder="<?php echo e(__('static.provider.enter_street_address')); ?>"
                        value="<?php echo e($serviceman?->primaryAddress?->street_address ?? old('street_address')); ?>">
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['street_address'];
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
        <div class="form-group row">
            <label class="col-md-2" for="postal_code"><?php echo e(__('static.postal_code')); ?><span> *</span></label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="postal_code" name="postal_code"
                    value="<?php echo e($serviceman?->primaryAddress?->postal_code ?? old('postal_code')); ?>"
                    placeholder="<?php echo e(__('static.users.postal_code')); ?>">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['postal_code'];
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


        <div class="card-footer">
            <button type="button" class="previousBtn btn cancel"><?php echo e(__('static.previous')); ?></button>
            <button class="btn btn-primary submitBtn spinner-btn" type="submit"><?php echo e(__('static.submit')); ?></button>
        </div>
    </div>
</div>
<?php $__env->startPush('js'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('app.google_map_api_key')); ?>&libraries=places"></script>

<script>
    window.gm_authFailure = function() {
        toastr.error(
            "Google Maps authentication failed. Please check your API key or ensure the Maps JavaScript API is enabled."
            );
    };

    window.addEventListener("error", function(e) {
        if (e.message && e.message.toLowerCase().includes("google maps")) {
            toastr.error("Google Maps failed to load. Check if the Maps JavaScript API is enabled.");
        }
    });
</script>

<script>
    (function($) {
        "use strict";

        $(document).ready(function() {

            function initializeGoogleAutocomplete() {

                try {
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
                } catch (error) {
                    console.error("Google Maps Autocomplete error:", error);
                    toastr.error(
                        "Failed to initialize Google Maps Autocomplete. Please check your API configuration."
                        );
                }
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
                            $('.select-state').val(stateId).trigger('change');
                            populateStates(countryId,stateId);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error in getAddressDetails:", textStatus,
                            errorThrown);
                    }
                });
            }

            initializeGoogleAutocomplete();
            
        });

})(jQuery);
</script>

<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            $("#servicemanForm").validate({
                ignore: [],
                rules: {
                    "image": {
                        accept: "image/jpeg, image/png"
                    },
                    "name": "required",
                    "email": {
                        required: true,
                        email: true
                    },
                    "phone": {
                        "required": true,
                        "minlength": 6,
                        "maxlength": 15
                    },
                    "zones[]": "required",
                    "experience_interval": "required",
                    "experience_duration": "required",
                    "password": {
                        required: isRequiredForEdit,
                        minlength: 8,
                    },
                    "confirm_password": {
                        required: isRequiredForEdit,
                        equalTo: "#password",
                        minlength: 8
                    },
                    "custom_text": {
                        required: function () {
                            return $('#other').is(':checked');
                        },
                    },
                    "country_id": "required",
                    "state_id": "required",
                    "postal_code": "required",
                    "city": "required",
                    "area": "required",
                },
                messages: {
                    "image": {
                        accept: "Only JPEG and PNG files are allowed.",
                    },
                }
            });
        });
        
        function isRequiredForEdit() {
            return "<?php echo e(isset($serviceman)); ?>" ? false : true;
        }

          $(document).on('change', '.category', function(e) {
                    if ($(this).val() === 'other') {
                        $('#custom_text').show();
                    }else{
                        $('#custom_text').hide();
                    }
                });
                
                if ($('.category:checked').val() === 'other') {
                    $('#custom_text').show();
                } else {
                    $('#custom_text').hide();
                }

                // Services fetching based on zones
                $('#zone_ids').on('change', function() {
                    var zoneIds = $(this).val();
                    var $serviceSelect = $('#service_ids');
                    
                    if (zoneIds && zoneIds.length > 0) {
                        $.ajax({
                            url: "<?php echo e(route('backend.serviceman.get-zone-services')); ?>",
                            type: "POST",
                            data: {
                                _token: "<?php echo e(csrf_token()); ?>",
                                zone_id: zoneIds
                            },
                            success: function(response) {
                                $serviceSelect.empty();
                                $.each(response, function(key, value) {
                                    $serviceSelect.append(new Option(value, key));
                                });
                                $serviceSelect.trigger('change');
                            },
                            error: function() {
                                toastr.error("Failed to load services for the selected zones.");
                            }
                        });
                    } else {
                        $serviceSelect.empty();
                        $serviceSelect.trigger('change');
                    }
                });

    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/serviceman/fields.blade.php ENDPATH**/ ?>