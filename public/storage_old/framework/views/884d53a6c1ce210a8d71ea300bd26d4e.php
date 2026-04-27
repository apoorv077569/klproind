<?php use \app\Helpers\Helpers; ?>
<?php
    $settings = Helpers::getSettings();
    $primaryColor = @$settings['appearance']['primary_color'] ?? '#5465ff';
    $sidebarColor = @$settings['appearance']['sidebar_color'] ?? '#000000';
    $fontFamily = @$settings['appearance']['font_family'] ?? 'Poppins';
?>

<style>
    :root {
        --primary-color: <?php echo e($primaryColor); ?>;
        --font-family: <?php echo e($fontFamily); ?>;
        --bg-sidebar: <?php echo e($sidebarColor); ?>;
    }
</style>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/inc/style.blade.php ENDPATH**/ ?>