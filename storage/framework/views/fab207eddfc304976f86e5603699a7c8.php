<div class="form-group row">
    <label class="col-md-2" for="image"><?php echo e(__('static.provider.image')); ?></label>
    <div class="col-md-10">
        <input class="form-control" type="file" accept=".jpg, .png, .jpeg" name="image" value="image">
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($user?->getFirstMedia('image')->original_url)): ?>
    <div class="form-group">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="image-list">
                    <div class="image-list-detail">
                        <div class="position-relative">
                            <img src="<?php echo e($user?->getFirstMedia('image')->original_url); ?>" id="<?php echo e($user?->getFirstMedia('image')->id); ?>" alt="User Image"
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
            value="<?php echo e(isset($user->name) ? $user->name : old('name')); ?>"
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
            value="<?php echo e(isset($user->email) ? $user->email : old('email')); ?>"
            placeholder="<?php echo e(__('static.users.enter_email')); ?>" autocomplete="off">
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
                <select class="select-2 form-control select-country-code" id="select-country-code" name="code"
                    data-placeholder="">
                    <?php
                        $default = old('code', $user->code ?? App\Helpers\Helpers::getDefaultCountryCode());
                    ?>
                    <option value="" selected></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = App\Helpers\Helpers::getCountryCodes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option class="option" value="<?php echo e($option->phone_code); ?>"
                            data-image="<?php echo e(asset('admin/images/flags/' . $option->flag)); ?>"
                            <?php if($option->phone_code == $default): ?> selected <?php endif; ?> data-default="<?php echo e($default); ?>">
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
                <input class="form-control phone-fill-input" type="number" name="phone" id="phone"
                    value="<?php echo e(isset($user->phone) ? $user->phone : old('phone')); ?>"
                    placeholder="<?php echo e(__('static.serviceman.enter_phone_number')); ?>" maxlength="15" oninput="this.value = this.value.slice(0, 15);" min="1" maxlength="15" oninput="this.value = this.value.slice(0, 15);">
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Request::is('backend/user/create')): ?>
    <div class="form-group row">
        <label class="col-md-2" for="password"><?php echo e(__('static.password')); ?><span> *</span></label>
        <div class="col-md-10">
            <div class="position-relative">
                <input class="form-control" id="password" type="password" name="password" autocomplete="off"
                    value="<?php echo e(old('password')); ?>" placeholder="<?php echo e(__('static.users.enter_password')); ?>">
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
        <label class="col-md-2" for="confirm_password"><?php echo e(__('static.confirm_password')); ?><span> *</span></label>
        <div class="col-md-10">
            <div class="position-relative">
                <input class="form-control" id="confirm_password" type="password" name="confirm_password"
                    value="<?php echo e(old('confirm_password')); ?>" autocomplete="off"
                    placeholder="<?php echo e(__('static.users.re_enter_password')); ?>">
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
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="form-group row ">
    <label class="col-md-2" for="role"><?php echo e(__('static.roles.role')); ?><span> *</span></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control" name="role" id="role"
            data-placeholder="<?php echo e(__('static.roles.select_role')); ?>">
            <option class="select-placeholder" value=""></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option class="option" value="<?php echo e($key); ?>" <?php if(old('role', isset($user) ? $user->roles->first()->id : null) == $key): ?> selected <?php endif; ?>>
                    <?php echo e($option); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['role'];
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
    <label class="col-md-2" for="role"><?php echo e(__('static.status')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($user)): ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1"
                        <?php echo e($user->status ? 'checked' : ''); ?>>
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
        $('.select-2').select2();
        $("#userForm").validate({
            ignore: [],
            rules: {
                "name": {
                    required: true
                },
                "email": {
                    required: true,
                    email: true
                },
                "phone": {
                    "required": true,
                    "minlength": 6,
                    "maxlength": 15
                },
                "image": {
                    accept: "image/jpeg, image/png"
                },
                "role": {
                    required: true
                },
                "password": {
                    required: true,
                    minlength:8
                },
                "confirm_password": {
                    required: true,
                    equalTo: "#password",
                    minlength:8
                },
            },
            messages: {
                "image": {
                    accept: "Only JPEG and PNG files are allowed.",
                },
            }
        });
        $('.select-2').on('select2:close', function(e) {
            $(this).valid();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/user/fields.blade.php ENDPATH**/ ?>