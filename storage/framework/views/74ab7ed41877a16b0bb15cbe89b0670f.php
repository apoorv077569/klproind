
<?php $__env->startSection('title', __('static.customer.create')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="m-auto col-xl-10 col-xxl-8">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('static.customer.create')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('backend.customer.store')); ?>" id="customerForm" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('backend.customer.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/customer/create.blade.php ENDPATH**/ ?>