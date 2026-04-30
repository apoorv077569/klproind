<?php use \App\Models\Role; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php
    $roles = Role::whereNot('name', RoleEnum::ADMIN)->get();
?>


<?php $__env->startSection('title', __('static.unverfied_users.unverfied_users')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5><?php echo e(__('static.unverfied_users.unverfied_users')); ?></h5>
                    <div class="btn-action unverified-btn-group">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.user.edit')): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-success verifyConfirmationBtn"
                                style="display: none;" data-url="<?php echo e(route('backend.verify-user')); ?>">
                                <span id="count-selected-verify-rows">0</span><?php echo e(__('static.verified_users')); ?>

                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.user.destroy')): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                                style="display: none;" data-url="<?php echo e(route('backend.delete.users')); ?>">
                                <span id="count-selected-rows">0</span><?php echo e(__('static.delete_selected')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="booking-table">
                        <div class="booking-select common-table-select">
                            <form>
                                <select class="select-2 form-control" id="userRoleFilter"
                                    data-placeholder="<?php echo e(__('static.booking.select_role')); ?>">
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($role?->name); ?>"
                                            <?php if(request()->role == $role?->name): ?> selected <?php endif; ?>><?php echo e($role?->name); ?></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </form>
                        </div>
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
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('#userRoleFilter').change(function() {
                    console.log("cdsxc")
                    var selectedStatus = $(this).val();
                    var newUrl = "<?php echo e(route('backend.unverfied-users.index')); ?>";
                    if (selectedStatus) {
                        newUrl += '?role=' + selectedStatus;
                    }
                    location.href = newUrl;
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/unverified-user/index.blade.php ENDPATH**/ ?>