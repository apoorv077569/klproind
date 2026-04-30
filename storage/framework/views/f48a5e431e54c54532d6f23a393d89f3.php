

<?php $__env->startSection('title', __('static.zone.all')); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5><?php echo e(__('static.zone.all')); ?></h5>
                    <div class="btn-action">
                        <button type="button" class="btn btn-outline-primary import-redirect-btn" data-url="<?php echo e(route('backend.import-export.index', 'zones')); ?>">
                            <?php echo e(__('static.import.import')); ?> <i class="ri-download-2-line"></i>
                        </button>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.zone.create')): ?>
                            <div class="btn-popup mb-0">
                                <a href="<?php echo e(route('backend.zone.create')); ?>" class="btn"><?php echo e(__('static.zone.create')); ?>

                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.zone.destroy')): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                                style="display: none;" data-url="<?php echo e(route('backend.delete.zones')); ?>">
                                <span id="count-selected-rows">0</span><?php echo e(__('static.deleted_selected')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="zone-table">
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

    <script>
        $(document).on('click', '.import-redirect-btn', function() {
            var url = $(this).data('url');
            if (url) {
                window.open(url, '_blank');
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/zone/index.blade.php ENDPATH**/ ?>