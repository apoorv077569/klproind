
<?php $__env->startSection('title', __('static.users.create')); ?>
<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.user.create')): ?>
        <div class="row">
            <div class="m-auto col-xl-10 col-xxl-8">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5><?php echo e(__('static.users.create')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form id="userForm" action="<?php echo e(route('backend.user.store')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('backend.user.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <div class="text-end">
                                <button id='submitBtn' type="submit"
                                    class="btn btn-primary spinner-btn ms-auto"><?php echo e(__('static.submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/user/create.blade.php ENDPATH**/ ?>