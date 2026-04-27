
<?php $__env->startSection('title', __('static.service.edit')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('static.service.edit')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('backend.service.update', $service->id)); ?>" id="serviceForm"
                        method="POST" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('backend.service.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </form>
                    <?php echo $__env->make('backend.service.address', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/service/edit.blade.php ENDPATH**/ ?>