<?php use \app\Helpers\Helpers; ?>

<?php
    $settings = Helpers::getSettings();
?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(session('dir', 'ltr')); ?>">

<head>
    <?php use \App\Models\Setting; ?>
    <?php
        $settings = Setting::first()->values;
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>" type="image/x-icon">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($settings['general']['site_name'])): ?>
            <?php echo e($settings['general']['site_name']); ?>

        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> <?php echo e(__('static.admin_panel')); ?></title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/bootstrap/bootstrap.min.css')); ?>">
    <!-- Remix Icon js -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/remix-icon.css')); ?>">
    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/datatables.css')); ?>">
    <!-- Select2 css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/select2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/dropzone.css')); ?>">
    <!-- ICONSAX css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/iconsax.css')); ?>">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/feather-icon/feather-icon.css')); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/toastr.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/select-datatables.min.css')); ?>">
    <!-- Admin css-->
    <?php echo app('Illuminate\Foundation\Vite')(['public/admin/scss/admin.scss', 'resources/js/app.js']); ?>

    <script src="<?php echo e(asset('admin/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/admin-cart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/toastr.min.js')); ?>"></script>
    <?php echo $__env->make('inc.style', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <script>
        const baseurl = "<?php echo e(asset('')); ?>";
    </script>
    <style>
        /* Hide Language Switchers and related fields in Admin Panel */
        .language-list, 
        .language-dropdown,
        .language-switcher,
        .onhover-dropdown:has(.language-dropdown),
        .form-group:has(.language-list),
        .form-group:has(#general\\[default_language_id\\]) {
            display: none !important;
        }
    </style>
</head>

<body class="theme <?php echo e(session('dir', 'ltr')); ?> <?php echo e(session('theme', '')); ?>">

    <div class="page-wrapper">

        <?php if ($__env->exists('backend.layouts.partials.header')) echo $__env->make('backend.layouts.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="page-body-wrapper">

            <?php if ($__env->exists('backend.layouts.partials.sidebar')) echo $__env->make('backend.layouts.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <div class="page-body">

                <?php if ($__env->exists('backend.layouts.partials.breadcrumb')) echo $__env->make('backend.layouts.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <div class="container-fluid">

                    <?php echo $__env->make('backend.inc.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>

            </div>

            <?php if ($__env->exists('backend.layouts.partials.footer')) echo $__env->make('backend.layouts.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <?php echo $__env->make('backend.inc.modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>

    </div>

    <!-- Dark mode js -->
    <script src="<?php echo e(asset('admin/js/dark-mode.js')); ?>"></script>
    
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('admin/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap/popper.min.js')); ?>"></script>

    <!-- Feather icon js -->
    <script src="<?php echo e(asset('admin/js/feather-icon/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/feather-icon/feather-icon.js')); ?>"></script>

    <!-- Iconsax js -->
    <script src="<?php echo e(asset('admin/js/iconsax.js')); ?>"></script>

    <!-- Height equal js -->
    <script src="<?php echo e(asset('admin/js/height-equal.js')); ?>"></script>

    <!-- Sidebar jquery -->
    <script src="<?php echo e(asset('admin/js/sidebar-menu.js')); ?>"></script>

    <!-- Tooltip js -->
    <script src="<?php echo e(asset('admin/js/tooltip-init.js')); ?>"></script>

    <!-- Tinymce Editor -->
    <script src="<?php echo e(asset('admin/js/tinymce/tinymce.js')); ?>"></script>

    <!-- Select2 -->
    <script src="<?php echo e(asset('admin/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/dropzone.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/buttons.server-side.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('js'); ?>

    <script src="<?php echo e(asset('admin/js/dropzone.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/admin-script.js')); ?>"></script>

    <?php echo $__env->make('backend.layouts.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
<?php echo $__env->yieldContent('modal'); ?>

</html>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/layouts/master.blade.php ENDPATH**/ ?>