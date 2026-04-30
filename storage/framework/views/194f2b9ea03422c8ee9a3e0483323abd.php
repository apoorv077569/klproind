<?php use \App\Helpers\Helpers; ?>

<?php $__env->startSection('title', __('static.categories.categories')); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/tree.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row g-sm-4 g-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_category.index')): ?>
            <div class="col-xxl-4 col-xl-5 col-12">
                <?php echo $__env->make('backend.category.tree', [
                    'categories' => $categories->all(),
                    'cat' => isset($cat) ? $cat : null,
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_category.create')): ?>
            <div class="col-xxl-8 col-xl-7 col-12">
                <div class="row g-sm-4 g-3">
                    <div class="col-12">
                        <div class="card tab2-card p-sticky">
                            <div class="card-header">
                                <h5><?php echo e(__('static.categories.create')); ?></h5>
                            </div>
                            <form action="<?php echo e(route('backend.category.store')); ?>" id="categoryForm" method="POST"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <?php echo $__env->make('backend.category.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <div class="text-end">
                                        <button id='submitBtn' type="submit"
                                            class="btn btn-primary ms-auto spinner-btn"><?php echo e(__('static.submit')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('admin/js/jstree.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/category/index.blade.php ENDPATH**/ ?>