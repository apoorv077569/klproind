<!-- Start Add Address Modal -->
<div class="modal fade address-modal" id="addaddress">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="<?php echo e(route('backend.address.store')); ?>" id="addressForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addaddressModalLabel"><?php echo e(__('static.address.add')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                        <input type="hidden" name="address_type" value="service">
                        <input type="hidden" name="id" value="<?php echo e($service->id); ?>">
                        <?php echo $__env->make('backend.address.fields', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gray btn-md" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add Address Modal -->
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service->addresses)): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $service->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
        <!-- Edit Address Modal -->
        <div class="modal fade edit-address" id="editAddress<?php echo e($address->id); ?>" tabindex="-1"
            aria-labelledby="editAddressLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form action="<?php echo e(route('backend.address.update', $address->id)); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editAddressLabel"><?php echo e(__('static.address.edit')); ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($service)): ?>
                                <input type="hidden" name="address_type" value="service">
                                <input type="hidden" name="id" value="<?php echo e($service->id); ?>">
                                <?php echo $__env->make('backend.address.fields', ['address' => $address], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-gray" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Address Modal -->
        <div class="modal fade" id="confirmationModal<?php echo e($address->id); ?>" tabindex="-1"
            aria-labelledby="confirmationModalLabel<?php echo e($address->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-start">
                        <div class="main-img">
                            <img src="<?php echo e(asset('admin/images/svg/trash-dark.svg')); ?>" alt="">
                        </div>
                        <div class="text-center">
                            <div class="modal-title"> <?php echo e(__('static.delete_message')); ?></div>
                            <p><?php echo e(__('static.delete_note')); ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="<?php echo e(route('backend.address.destroy', $address->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn cancel" data-bs-dismiss="modal" type="button"><?php echo e(__('static.cancel')); ?></button>
                            <button class="btn btn-primary delete" type="submit"><?php echo e(__('static.delete')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    "use strict";

    $("#addressForm").validate({
        ignore: [],
        rules: {
            "country_id": "required",
            "state_id": "required",
            "city": "required",
            "area": "required",
            "postal_code": "required",
            "address": "required"
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/service/address.blade.php ENDPATH**/ ?>