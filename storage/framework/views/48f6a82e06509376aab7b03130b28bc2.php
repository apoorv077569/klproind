<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php if ($__env->exists('frontend.layout.seo')) echo $__env->make('frontend.layout.seo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>" type="image/x-icon">

    <link rel="shortcut icon" href="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>" type="image/x-icon">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/bootstrap.css')); ?>">

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/toastr.min.css')); ?>">

    <!-- ICONSAX css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/iconsax.css')); ?>">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/feather-icon/feather-icon.css')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')(['public/admin/scss/admin.scss', 'resources/js/app.js']); ?>
</head>

<body onload="startTime()">

    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Latest jquery -->
    <script src="<?php echo e(asset('admin/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-ui.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/toastr.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>

    <!-- Feather icon js -->
    <script src="<?php echo e(asset('admin/js/feather-icon/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/feather-icon/feather-icon.js')); ?>"></script>

    <!-- Iconsax js -->
    <script src="<?php echo e(asset('admin/js/iconsax.js')); ?>"></script>
    <!-- Clock js -->
    <script src="<?php echo e(asset('admin/js/clock.js')); ?>"></script>
    <!-- Time js -->
    <script src="<?php echo e(asset('admin/js/time.js')); ?>"></script>
    <!-- Password hide show js -->

     <!-- Tinymce Editor -->
     <script src="<?php echo e(asset('admin/js/tinymce/tinymce.js')); ?>"></script>


    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/jquery-validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery-validation/additional-methods.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/select2.full.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('js'); ?>

    <?php echo $__env->make('backend.layouts.partials.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/auth/master.blade.php ENDPATH**/ ?>