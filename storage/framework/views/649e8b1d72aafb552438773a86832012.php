
<?php $__env->startSection('title', __('static.service.create')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('static.service.create')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('backend.service.store')); ?>" id="serviceForm" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('backend.service.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </form>
                    <?php echo $__env->make('backend.service.address', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/service/create.blade.php ENDPATH**/ ?>