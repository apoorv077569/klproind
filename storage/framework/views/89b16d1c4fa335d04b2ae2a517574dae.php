<script>
    $(document).ready(function() {
        <?php if(Session::has('message') || Session::has('success')): ?>
            toastr.options = {
                "closeButton": false,
                "progressBar": true,
            }
            toastr.success("<?php echo e(session('message') ?: session('success')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options = {
                "closeButton": false,
                "progressBar": true,
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.options = {
                "closeButton": false,
                "progressBar": true,
            }
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            toastr.options = {
                "closeButton": false,
                "progressBar": true,
            }
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>
    });
</script>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/inc/alerts.blade.php ENDPATH**/ ?>