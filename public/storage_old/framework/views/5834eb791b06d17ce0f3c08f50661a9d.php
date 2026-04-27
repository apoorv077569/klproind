<?php $__env->startSection('title', 'Abandoned Carts'); ?>

<?php $__env->startSection('content'); ?>
    <?php use \App\Helpers\Helpers; ?>
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5>Abandoned Carts</h5>
                </div>
                <div class="card-body common-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <div class="d-flex char-name">
                                                <div class="char-img">
                                                    <img src="<?php echo e($cart->customer?->getFirstMediaUrl('image') ?: asset('admin/images/avatar/1.jpg')); ?>" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                                                </div>
                                                <div class="char-content ms-2">
                                                    <h6><?php echo e($cart->customer?->name); ?></h6>
                                                    <span><?php echo e($cart->customer?->email); ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo e($cart->service?->title); ?></td>
                                        <td>
                                            <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(number_format($cart->service?->price, 2)); ?>

                                        </td>
                                        <td><?php echo e($cart->created_at->format('d M, Y H:i A')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('backend.cart.reminder', $cart->id)); ?>" class="btn btn-primary btn-sm">Send Reminder</a>
                                        </td>
                                    </tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No abandoned carts found.</td>
                                    </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/cart/index.blade.php ENDPATH**/ ?>