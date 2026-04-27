

<?php $__env->startSection('title', __('static.serviceman.edit')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('static.serviceman.edit')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('backend.serviceman.update', $serviceman->id)); ?>" id="servicemanForm"
                        method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <?php echo $__env->make('backend.serviceman.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/serviceman/edit.blade.php ENDPATH**/ ?>