<?php use \App\Models\Setting; ?>
<?php use \app\Helpers\Helpers; ?>

<?php
    $settings = Setting::first()->values;
    $lang = Helpers::getLanguageByLocale(Session::get('locale', 'en'));
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($lang->is_rtl ? 'rtl' : 'ltr'); ?>"
    <?php if(isset($themeOptions['general']['theme_color'])): ?> style=" --primary-color:<?php echo e($themeOptions['general']['theme_color']); ?>;" <?php endif; ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>"
        type="image/x-icon">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/toastr.min.css')); ?>">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendors/bootstrap/bootstrap.css')); ?>">

    <!-- ICONSAX css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendors/iconsax/iconsax.css')); ?>">

    <!-- select2 css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendors/select2.css')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')(['public/frontend/scss/style.scss']); ?>

</head>

<body class="notLoaded">
    <!-- Loader Section Start -->
    <div class="page-loader" id="loader">
        <div class="page-loader-wrapper">
            <img src="<?php echo e(asset('frontend/images/gif/loader.gif')); ?>" alt="loader">
        </div>
    </div>
    <!-- Loader Section End -->

    <div class="log-in-section">
        <div class="row login-content g-0">
            <div class="col image-col col-xl-6 d-xl-block d-none">
                <div class="image-contain">
                    <a href="<?php echo e(route('frontend.home')); ?>"><img
                            src="<?php echo e(asset($themeOptions['authentication']['header_logo']) ?? ''); ?>" class="logo"
                            alt=""></a>
                    <img src="<?php echo e(asset($themeOptions['authentication']['auth_images']) ?? ''); ?>" class="auth-image"
                        alt="">
                    <div class="auth-content">
                        <h2><?php echo e($themeOptions['authentication']['title']); ?></h2>
                        <p>
                            <?php echo e($themeOptions['authentication']['description']); ?>

                        </p>
                        <div class="app-install">
                            <a href="<?php echo e($themeOptions['general']['app_store_url']); ?>" target="_blank"
                                rel="noopener noreferrer">
                                <img src="<?php echo e(asset('frontend/images/app-store.png')); ?>" alt="app store">
                            </a>
                            <a href="<?php echo e($themeOptions['general']['google_play_store_url']); ?>" target="_blank"
                                rel="noopener noreferrer">
                                <img src="<?php echo e(asset('frontend/images/google-play.png')); ?>" alt="google play">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col content-col col-xl-6 col-12 p-0">
                <div class="login-main">
                    <div class="pt-4" style="display:none;">
                        <div class="dropdown language-dropdown">
                            <?php
                                $lang = Helpers::getLanguageByLocale(Session::get('locale', 'en'));
                                $flag = $lang?->flag;
                            ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count(Helpers::getLanguages()) <= 1): ?>
                                <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                                    class="language-btn">
                                    <span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                            <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                                alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                                class="img-fluid">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <?php echo e(strtoupper(Session::get('locale', 'en'))); ?>

                                    </span>
                                </a>
                            <?php else: ?>
                                
                                <button id="languageSelected" class="language-btn">
                                    <span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isFileExistsFromURL($flag)): ?>
                                            <img src="<?php echo e(Helpers::isFileExistsFromURL($flag, true)); ?>"
                                                alt="<?php echo e($lang?->name); ?>" class="img-fluid">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('admin/images/No-image-found.jpg')); ?>" alt=""
                                                class="img-fluid">
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <?php echo e(strtoupper(Session::get('locale', 'en'))); ?>

                                    </span>
                                    <i class="iconsax" icon-name="chevron-down"></i>
                                </button>
                                <ul class="onhover-show-div">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <li class="lang">
                                            <a href="<?php echo e(route('lang', ['locale' => @$lang?->locale, 'locale_flag' => @$lang?->flag_path])); ?>"
                                                data-lng="<?php echo e(@$lang?->locale); ?>">
                                                <img class="img-fluid lang-img" alt="<?php echo e($lang?->name); ?>"
                                                    src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>">
                                                <?php echo e(@$lang?->name); ?>

                                            </a>
                                        </li>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                        <li class="lang">
                                            <a href="<?php echo e(route('lang', 'en')); ?>" data-lng="en">
                                                <img class="active-icon" src="<?php echo e(asset('admin/images/flags/LR.png')); ?>"
                                                    alt="en"> En
                                            </a>
                                        </li>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </ul>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <div class="login-card">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest jquery -->
    <script src="<?php echo e(asset('admin/js/jquery-3.7.1.min.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/toastr.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('frontend/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap/popper.min.js')); ?>"></script>
    <!-- Iconsax js -->
    <script src="<?php echo e(asset('frontend/js/iconsax/iconsax.js')); ?>"></script>
    <!-- Swiper-bundle js -->
    <script src="<?php echo e(asset('frontend/js/swiper-slider/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/swiper.js')); ?>"></script>
    <!-- Script js -->
    <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/custom-aos.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>

    <!-- Js Validator  -->
    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.min.js')); ?>"></script>

    <!-- Password Hide Show Js -->
    <script src="<?php echo e(asset('frontend/js/password-hide-show.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('js'); ?>
    <script>
        $('form').on('submit', function(e) {
            var $form = $(this);
            var $submitButton = $form.find('.submit.spinner-btn');
            var $spinner = $submitButton.find('.spinner-border');
            e.preventDefault();
            if ($form.valid()) {
                if ($submitButton.length && $spinner.length) {
                    $spinner.show();
                    $submitButton.prop('disabled', true);
                }

                $form[0].submit();
            }
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/frontend/auth/master.blade.php ENDPATH**/ ?>