

<?php $__env->startSection('title', __('static.zone.create')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="m-auto col-12-8">
        <div class="card tab2-card">
            <div class="card-header">
                <h5><?php echo e(__('static.zone.create')); ?></h5>
            </div>
            <div class="card-body map-box">
                <div class="row g-lg-5 g-md-4 g-3">
                    <div class="col-xl-7 order-xl-1 order-last">
                        <form action="<?php echo e(route('backend.zone.store')); ?>" id="zoneForm" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('backend.zone.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <div class="text-end">
                                <button id='submitBtn' type="button" class="btn btn-primary spinner-btn ms-auto"><?php echo e(__('static.submit')); ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-5 order-xl-2 order-1">
                        <div class="map-instruction">
                            <h4><?php echo e(__('static.zone.map_instruction_heading')); ?></h4>
                            <p><?php echo e(__('static.zone.map_instruction_title')); ?></p>
                            <div class="map-detail">
                                <i data-feather="move"></i>
                                <?php echo e(__('static.zone.map_instruction_paragraph_1')); ?>

                            </div>
                            <div class="map-detail">
                                <i data-feather="pen-tool"></i>
                                <?php echo e(__('static.zone.map_instruction_paragraph_2')); ?>

                            </div>
                            <img src="<?php echo e(asset('admin/images/map.gif')); ?>" class="notify-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/zone/create.blade.php ENDPATH**/ ?>