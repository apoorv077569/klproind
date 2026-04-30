
<?php $__env->startSection('title', __('static.profile')); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('static.profile')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="row g-sm-4 g-3">
                <div class="col-12">
                    <div class="card tab2-card">
                        <div class="card-header">
                            <h5><?php echo e(__('static.edit_profile')); ?></h5>
                        </div>

                        <div class="card-body profile-detail">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($errors->has('name') || $errors->has('email') || $errors->has('role') || $errors->has('country_id') || $errors->has('state_id') || $errors->has('city') || $errors->has('phone') || $errors->has('countryCode') || $errors->has('latitude') || $errors->has('longitude') || !$errors->any() ? 'show active' : ''); ?>"
                                        id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab"
                                        aria-controls="top-profile" aria-selected="true">
                                        <i data-feather="user"></i><?php echo e(__('static.profile')); ?>

                                    </a>
                                </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!Auth::user()->hasRole('admin')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bank_details-tab" data-bs-toggle="tab" href="#bank_details"
                                            role="tab" aria-controls="address" aria-selected="true" data-tab="1">
                                            <i data-feather="briefcase"></i>
                                            <?php echo e(__('static.provider.bank_details')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active' : ''); ?>"
                                        id="changepassword-tab" data-bs-toggle="tab" href="#changepassword" role="tab"
                                        aria-controls="changepassword" aria-selected="false">
                                        <i data-feather="eye"></i><?php echo e(__('static.change_password')); ?>

                                    </a>
                                </li>
                            </ul>
                            <form action="<?php echo e(route('backend.account.profile.update')); ?>" method="POST" id="profileForm"
                                enctype="multipart/form-data">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade <?php echo e($errors->has('name') || $errors->has('email') || $errors->has('country_id') || $errors->has('state_id') || $errors->has('city') || $errors->has('phone') || $errors->has('countryCode') || $errors->has('latitude') || $errors->has('longitude') || !$errors->any() ? 'show active' : ''); ?>"
                                        id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                        <div class="form-group row">
                                            <label class="col-md-2" for="name"><?php echo e(__('static.serviceman.image')); ?></label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="image" accept=".jpg, .png, .jpeg"
                                                    value="<?php echo e(old('image')); ?>">
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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::user()->getFirstMediaUrl('image') && Auth::user()->getFirstMediaUrl('image') !== null): ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-10">
                                                        <div class="image-list">
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = Auth::user()->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <div class="image-list-detail">
                                                                    <div class="position-relative">
                                                                        <img src="<?php echo e($media['original_url']); ?>"
                                                                            id="<?php echo e($media['id']); ?>" alt="User Image"
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
                                        <div class="form-group row">
                                            <label class="col-md-2" for="name"><?php echo e(__('static.name')); ?><span> *</span></label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" id="name" name="name"
                                                    value="<?php echo e(Auth::user()->name ? Auth::user()->name : old('name')); ?>"
                                                    placeholder="<?php echo e(__('static.users.enter_name')); ?>">
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
                                                <input class="form-control" type="text" id="email" name="email"
                                                    value="<?php echo e(Auth::user()->email ? Auth::user()->email : old('email')); ?>"
                                                    placeholder="<?php echo e(__('static.users.enter_email')); ?>">
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
                                                        <select class="form-control select-country-code" id="select-country-code"
                                                            name="code" data-placeholder="1">
                                                            <?php
                                                                $default = old('code', Auth::user()->code ?? App\Helpers\Helpers::getDefaultCountryCode());
                                                            ?>
                                                            <option value="" selected></option>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = App\Helpers\Helpers::getCountryCodes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <option class="option" value="<?php echo e($option->phone_code); ?>"
                                                                    data-image="<?php echo e(asset('admin/images/flags/' . $option->flag)); ?>"
                                                                    <?php if($option->phone_code == $default): ?> selected <?php endif; ?>
                                                                    data-default="<?php echo e($default); ?>">
                                                                    +<?php echo e($option->phone_code); ?>

                                                                </option>
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
                                                            value="<?php echo e(isset(Auth::user()->phone) ? Auth::user()->phone : old('phone')); ?>"
                                                            min="1"
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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!Auth::user()->hasRole('admin')): ?>
                                            <?php
                                                $address = auth()->user()->PrimaryAddress;
                                                if (isset($address->country_id) || old('country_id')) {
                                                    $states = \App\Models\State::where(
                                                        'country_id',
                                                        old('country_id', @$address->country_id),
                                                    )->get();
                                                } else {
                                                    $states = [];
                                                }
                                            ?>
                                            <?php
                                                $default = old('country_id', @$address->country_id);
                                            ?>

                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::user()->hasRole('provider')): ?>
                                                <?php
                                                    $zones = \App\Models\Zone::all();
                                                    $userZones = Auth::user()->zones->pluck('id')->toArray();
                                                ?>
                                                <div class="form-group row">
                                                    <label class="col-md-2" for="zoneIds"><?php echo e(__('static.zone.zones')); ?></label>
                                                    <div class="col-md-10 error-div select-dropdown ">
                                                        <select class="select-2 form-control disable-all" id="zoneIds" name="zoneIds[]" multiple="multiple" search="true"
                                                            data-placeholder="<?php echo e(__('static.zone.select-zone')); ?>">
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <option value="<?php echo e($zone->id); ?>" <?php echo e(in_array($zone->id, $userZones) ? 'selected' : ''); ?>><?php echo e($zone->name); ?></option>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                        </select>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['zoneIds'];
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
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                            <div class="form-group row">
                                                <label for="country" class="col-md-2"><?php echo e(__('static.users.country')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10 error-div select-dropdown">
                                                    <select class="select-2 form-control select-country" id="select-country"
                                                        name="country_id"
                                                        data-placeholder="<?php echo e(__('static.users.select_country')); ?>">
                                                        <option class="select-placeholder" value=""></option>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                            <option class="option" value=<?php echo e($key); ?>

                                                                <?php if($key == $default): ?> selected <?php endif; ?>>
                                                                <?php echo e($option); ?>

                                                            </option>
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
                                            <input type="hidden" name="address_id" value="<?php echo e($address->id ?? null); ?>">
                                            <div class="form-group row">
                                                <label for="state" class="col-md-2"><?php echo e(__('static.users.state')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10 error-div select-dropdown">
                                                    <select class="select-2 form-control select-state"
                                                        data-placeholder="<?php echo e(__('static.users.select_state')); ?>" id="state_id"
                                                        name="state_id" data-default-state-id="<?php echo e($address->state_id ?? ''); ?>"
                                                        required>
                                                        <option class="select-placeholder" value=""></option>
                                                        <?php
                                                            $default = old('state_id', @$address->state_id);
                                                        ?>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($states)): ?>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <option class="option" value=<?php echo e($state->id); ?>

                                                                    <?php if($state->id == $default): ?> selected <?php endif; ?>
                                                                    data-default="<?php echo e($default); ?>">
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
                                                <label class="col-md-2" for="branch_name"><?php echo e(__('static.city')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="city"
                                                        value="<?php echo e(isset($address->city) ? $address->city : old('city')); ?>"
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
                                                <label class="col-md-2" for="branch_name"><?php echo e(__('static.area')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="area"
                                                        value="<?php echo e(isset($address->area) ? $address->area : old('area')); ?>"
                                                        placeholder="<?php echo e(__('static.users.enter_area')); ?>">
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
                                                <label class="col-md-2" for="branch_name"><?php echo e(__('static.postal_code')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" name="postal_code"
                                                        value="<?php echo e(isset($address->postal_code) ? $address->postal_code : old('postal_code')); ?>"
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
                                            <div class="form-group row">
                                                <label for="address" class="col-md-2"><?php echo e(__('static.users.address')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" placeholder="<?php echo e(__('static.account.enter_address')); ?>" rows="4" id="address"
                                                        name="address" cols="50"><?php echo e($address->address ?? old('address')); ?></textarea>
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
                                            <input type="hidden" name="is_primary" value="true">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!Auth::user()->hasRole('admin')): ?>
                                        <div class="footer">
                                            <button type="button"
                                                class="nextBtn btn btn-primary"><?php echo e(__('static.next')); ?></button>
                                        </div>
                                        <?php else: ?>
                                            <div class="card-footer">
                                                <button type="submit"
                                                    class="btn btn-primary spinner-btn"><?php echo e(__('static.submit')); ?></button>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!Auth::user()->hasRole('admin')): ?>
                                    <div class="tab-content" id="top-tabContent">
                                        <div class="tab-pane fade" id="bank_details" role="tabpanel"
                                            aria-labelledby="bank_details-tab">
                                            <div class="form-group row">
                                                <label class="col-md-2"
                                                    for="bank_name"><?php echo e(__('static.bank_details.bank_name')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="bank_name" id="bank_name"
                                                        value="<?php echo e(isset($user->bankDetail->bank_name) ? $user->bankDetail->bank_name : old('bank_name')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_bank_name')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['bank_name'];
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
                                                <label class="col-md-2"
                                                    for="holder_name"><?php echo e(__('static.bank_details.holder_name')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="holder_name"
                                                        id="holder_name"
                                                        value="<?php echo e(isset($user->bankDetail->holder_name) ? $user->bankDetail->holder_name : old('holder_name')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_holder_name')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['holder_name'];
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
                                                <label class="col-md-2"
                                                    for="account_number"><?php echo e(__('static.bank_details.account_number')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="number" name="account_number"
                                                        id="account_number"
                                                        value="<?php echo e(isset($user->bankDetail->account_number) ? $user->bankDetail->account_number : old('account_number')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_account_number')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['account_number'];
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
                                                <label class="col-md-2"
                                                    for="branch_name"><?php echo e(__('static.bank_details.branch_name')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="branch_name"
                                                        id="branch_name"
                                                        value="<?php echo e(isset($user->bankDetail->branch_name) ? $user->bankDetail->branch_name : old('branch_name')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_branch_name')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['branch_name'];
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
                                                <label class="col-md-2"
                                                    for="ifsc_code"><?php echo e(__('static.bank_details.ifsc_code')); ?></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="ifsc_code" id="ifsc_code"
                                                        value="<?php echo e(isset($user->bankDetail->ifsc_code) ? $user->bankDetail->ifsc_code : old('ifsc_code')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_ifsc_code')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['ifsc_code'];
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
                                                <label class="col-md-2"
                                                    for="swift_code"><?php echo e(__('static.bank_details.swift_code')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="swift_code" id="swift_code"
                                                        value="<?php echo e(isset($user->bankDetail->swift_code) ? $user->bankDetail->swift_code : old('swift_code')); ?>"
                                                        placeholder="<?php echo e(__('static.bank_details.enter_swift_code')); ?>">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['swift_code'];
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
                                                <button type="submit"
                                                    class="btn btn-primary spinner-btn"><?php echo e(__('static.submit')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </form>

                            <form action="<?php echo e(route('backend.account.password.update')); ?>" method="POST" id="changePasswordForm"
                                enctype="multipart/form-data">
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade <?php echo e($errors->has('new_password') || $errors->has('confirm_password') || $errors->has('current_password') ? 'active show' : ''); ?>"
                                        id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                                        <div class="account-setting">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('put'); ?>
                                            <div class="form-group row">
                                                <label class="col-md-2"
                                                    for="current_password"><?php echo e(__('static.current_password')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <div class="position-relative">
                                                        <input class="form-control" id="current_password" type="password"
                                                            name="current_password" autocomplete="off"
                                                            value="<?php echo e(old('current_password')); ?>"
                                                            placeholder="<?php echo e(__('static.serviceman.enter_current_password')); ?>">
                                                        <div class="toggle-password">
                                                            <i data-feather="eye" class="eye"></i>
                                                            <i data-feather="eye-off" class="eye-off"></i>
                                                        </div>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['current_password'];
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
                                                <label class="col-md-2" for="new_password"><?php echo e(__('static.new_password')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <div class="position-relative">
                                                        <input class="form-control" id="new_password" type="password"
                                                            name="new_password" autocomplete="off"
                                                            value="<?php echo e(old('new_password')); ?>"
                                                            placeholder="<?php echo e(__('static.serviceman.enter_password')); ?>">
                                                        <div class="toggle-password">
                                                            <i data-feather="eye" class="eye"></i>
                                                            <i data-feather="eye-off" class="eye-off"></i>
                                                        </div>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['new_password'];
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
                                                <label class="col-md-2"
                                                    for="confirm_password"><?php echo e(__('static.confirm_password')); ?><span>
                                                        *</span></label>
                                                <div class="col-md-10">
                                                    <div class="position-relative">
                                                        <input class="form-control" id="confirm_password" type="password"
                                                            name="confirm_password" value="<?php echo e(old('confirm_password')); ?>"
                                                            autocomplete="off"
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
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit"
                                                class="btn btn-primary spinner-btn"><?php echo e(__('static.submit')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

    <?php $__env->startPush('js'); ?>
        <script>
            (function($) {
                "use strict";

                $(document).ready(function() {

                    let profileFormRules = {
                        "image": {
                            accept: "image/jpeg, image/png"
                        },
                        "name": "required",
                        "email": "required",
                        "phone": "required",
                        "bank_name": "required",
                        "holder_name": "required",
                        "account_number": "required",
                        "branch_name": "required",
                        "swift_code": "required",
                    };

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('admin')): ?>
                        profileFormRules["country_id"] = "required";
                        profileFormRules["state_id"] = "required";
                        profileFormRules["city"] = "required";
                        profileFormRules["area"] = "required";
                        profileFormRules["postal_code"] = "required";
                        profileFormRules["address"] = "required";
                    <?php endif; ?>


                    $("#profileForm").validate({
                        ignore: [],
                        rules: profileFormRules,
                        invalidHandler: function(event, validator) {
                            let invalidTabs = [];
                            $.each(validator.errorList, function(index, error) {
                                const tabId = $(error.element).closest('.tab-pane').attr('id');

                                $("#" + tabId + "-tab .errorIcon").show();
                                if (!invalidTabs.includes(tabId)) {
                                    invalidTabs.push(tabId);
                                }
                            });
                            if (invalidTabs.length) {
                                $(".nav-link.active").removeClass("active");
                                $(".tab-pane.show").removeClass("show active");


                                $("#" + invalidTabs[0] + "-tab").addClass("active");
                                $("#" + invalidTabs[0]).addClass("show active");
                            }
                        },
                        success: function(label, element) {
                            $(element).closest('.tab-pane').find('.errorIcon').hide();
                        }
                    });
                    $("#changePasswordForm").validate({
                        ignore: [],
                        rules: {
                            "current_password": "required",
                            "new_password": {
                                required: true,
                                minlength: 8,
                            },
                            "confirm_password": {
                                required: true,
                                equalTo: "#new_password",
                                minlength: 8,
                            },
                        }
                    });

                });
            })(jQuery);
        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/account/profile.blade.php ENDPATH**/ ?>