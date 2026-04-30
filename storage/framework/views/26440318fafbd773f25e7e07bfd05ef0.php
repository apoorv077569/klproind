
<?php $__env->startSection('title', __('static.document.documents')); ?>
<?php $__env->startSection('content'); ?>
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5><?php echo e(__('static.document.documents')); ?></h5>
                    <div class="btn-action">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.document.create')): ?>
                            <div class="btn-popup mb-0">
                                <a href="<?php echo e(route('backend.document.create')); ?>" class="btn"><?php echo e(__('static.document.create')); ?>

                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.document.destroy')): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                                style="display: none;" data-url="<?php echo e(route('backend.delete.documents')); ?>">
                                <span id="count-selected-rows">0</span><?php echo e(__('static.delete_selected')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body common-table">
                    <div class="document-table">
                        <div class="table-responsive">
                            <?php echo $dataTable->table(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/document/index.blade.php ENDPATH**/ ?>