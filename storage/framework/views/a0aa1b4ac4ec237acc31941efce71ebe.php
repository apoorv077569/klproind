<?php $__env->startSection('title', __('Login')); ?>

<?php $__env->startSection('content'); ?>
<?php
    $settings = \App\Models\Setting::first()->values;
?>
<section class="auth-page" style="background-image: url('<?php echo e(env('APP_URL')); ?>/admin/images/login-bg.png')">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-lg-8 ms-auto">
                <div class="auth-card">
                    <div class="text-center">
                        <img class="login-img" src="<?php echo e(asset($settings['general']['dark_logo']) ?? asset('admin/images/logo-dark.png')); ?>">
                    </div>
                    <div class="welcome">
                        <h3><?php echo e(__('static.welcome_note')); ?> <?php echo e($settings['general']['site_name'] ?? ''); ?></h3>
                        <p><?php echo e(__('static.sign_in_note')); ?></p>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="error-note" id="errors">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <p><?php echo e($error); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <i data-feather="x" class="close-errors"></i>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="main">
                        <form id="loginForm" class="login-form" action="<?php echo e(route('login')); ?>" method='POST'>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="name"><?php echo e(__('static.email')); ?></label>
                                <i data-feather="mail"></i>
                                <input class="form-control search-input" id="email-input" name="email" value="<?php echo e(old('email')); ?>" aria-describedby="email" placeholder="<?php echo e(__('static.e-mail_address')); ?>">
                            </div>
                            <div class="form-group mb-0">
                                <label for="name"><?php echo e(__('static.password')); ?></label>
                                <i data-feather="lock"></i>
                                <div class="position-relative">
                                    <input class="form-control search-input" id="password-input" type="password" name="password" aria-describedby="password" placeholder="<?php echo e(__('static.login.password')); ?>">
                                    <div class="toggle-password">
                                        <i data-feather="eye" class="eye position-static"></i>
                                        <i data-feather="eye-off" class="position-static eye-off"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="forgot-pass">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('password.request')): ?>
                                <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('static.login.forgot_password')); ?></a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="save" class="btn btn-solid btn submit spinner-btn"><?php echo e(__('auth.sign_in')); ?></button>
                            </div>
                            <div class="not-member">
                                <h5><?php echo e(__('frontend::auth.not_member')); ?> <a href="<?php echo e(route('become-provider.index')); ?>"><?php echo e(__('auth.sign_up')); ?></a></h5>
                            </div>
                        </form>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($settings['activation']['default_credentials'])): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($settings['activation']['default_credentials']): ?>
                            <div class="demo-credential">
                                <button class="btn btn-solid default-credentials" data-email="admin@example.com"><?php echo e(__('static.dashboard.admin')); ?></button>
                               <!--<button class="btn btn-solid default-credentials" data-email="provider@example.com"><?php echo e(__('static.dashboard.provider')); ?></button>
                                <button class="btn btn-solid default-credentials" data-email="servicemen@example.com"><?php echo e(__('static.dashboard.serviceman')); ?></button>-->
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="animate-object">
            <img class="vase-img" src="<?php echo e(asset('admin/images/vase.png')); ?>">
            <img class="girl-img" src="<?php echo e(asset('admin/images/girl.png')); ?>">
            <img class="lamp-img" src="<?php echo e(asset('admin/images/lamp.png')); ?>">
            <div class="clockbox">
                <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                    <g id="face">
                        <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                        <path class="hour-marks"
                            d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                        </path>
                        <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                    </g>
                    <g id="hour">
                        <path class="hour-hand" d="M300.5 298V142"></path>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                    </g>
                    <g id="minute">
                        <path class="minute-hand" d="M300.5 298V67"> </path>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                    </g>
                    <g id="second">
                        <path class="second-hand" d="M300.5 350V55"></path>
                        <circle class="sizing-box" cx="300" cy="300" r="253.9"> </circle>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(config('app.google_recaptcha_key')); ?>"></script>

<script type="text/javascript">
    var recaptchaStatus = <?php echo json_encode($settings['google_reCaptcha']['status']); ?>;
    var recaptchaKey = "<?php echo e(config('app.google_recaptcha_key')); ?>";

    $('#loginForm').submit(function(event) {
         console.log("LOGIN BUTTON CLICKED");
    console.log($(this).serialize());
        event.preventDefault();

        if (!$(this).valid()) {
            return false;
        }
            
        $('.re-captcha').empty();

        if (recaptchaStatus == 1 && recaptchaKey) {
            try {
                grecaptcha.execute(recaptchaKey, { action: 'login' })
                    .then(function(token) {
                        $('#loginForm').prepend(
                            '<input type="hidden" name="g-recaptcha-response" value="' + token + '">'
                        );
                        $('#loginForm').unbind('submit').submit();
                    });
             } catch (e) {
                toastr.error('We could not verify the reCAPTCHA');
                setTimeout(function () {
                    $('#loginForm').off('submit').submit();
                });
            }
        } else {
            $('#loginForm').unbind('submit').submit();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(".close-errors").click(function() {
            $("#errors").remove();
        });

        $("#loginForm").validate({
            ignore: [],
            rules: {
                "email": "required",
                "password": "required",
            }
        });

        $(".default-credentials").click(function() {
            $("#email-input").val("");
            $("#password-input").val("");
            var email = $(this).data("email");
            $("#email-input").val(email);
            $("#password-input").val("123456789");
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('auth.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/auth/login.blade.php ENDPATH**/ ?>