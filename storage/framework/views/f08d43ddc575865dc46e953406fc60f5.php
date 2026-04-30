<?php use \App\Helpers\Helpers; ?>
<div class="left-jstree-box">
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5><?php echo e(__('static.categories.categories')); ?></h5>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cat)): ?>
                        <div class="btn-popup mb-0">
                            <a href="<?php echo e(Helpers::withZone('backend.category.index')); ?>" class="btn btn-primary btn-sm">
                                <i data-feather="plus"></i><?php echo e(__('static.categories.category')); ?>

                            </a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="card-body position-relative no-data">
                    <form class="d-flex gap-2" action="" method="get">
                        <input type="text" name="search" id="searchCategory" value="<?php echo e(request()->search); ?>"
                            class="form-control" placeholder="Search Category...">
                        <button id="submitBtn" type="submit" class="btn btn-primary"> <?php echo e(__('Search')); ?></button>
                    </form>
                    <div class="jstree-main-box">
                        <div class="jstree-loader">
                            <img src="<?php echo e(asset('admin/images/loader.gif')); ?>" class="img-fluid">
                        </div>
                        <div id="treeBasic" style="display: none">
                            <ul>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li class="jstree-open"
                                        data-jstree='{&quot;selected&quot;:<?php if(isset($cat) && $cat->id == $category->id): ?> true <?php else: ?> false <?php endif; ?>,"icon":"<?php echo e(asset('admin/images/menu.png')); ?>"}'>

                                        <div class="jstree-anchor" data-bs-toggle="tooltip"
                                            data-bs-title="<?php echo e($category->title); ?>">
                                            <span>
                                                <?php echo e($category->title); ?>

                                                (Services: <?php echo e($category->services_count ?? 0); ?>)
                                            </span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_category.edit', $category)): ?>
                                                <div class="actions">
                                                    <a id="edit-category" href="#">
                                                        <img class="edit-icon"
                                                            data-url="<?php echo e(Helpers::withZone('backend.category.edit', ['category' => $category->id, 'locale' => request()->locale ?? app()->getlocale()])); ?>"
                                                            value="<?php echo e($category->id); ?>"
                                                            src="<?php echo e(asset('admin/images/svg/edit-2.svg')); ?>">
                                                    </a>
                                                    <a href="#confirmationModal<?php echo e($category->id); ?>" data-bs-toggle="modal">
                                                        <img class="remove-icon"
                                                            src="<?php echo e(asset('admin/images/svg/trash-table.svg')); ?>">
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($category->childs)): ?>
                                            <?php echo $__env->make('backend.category.child', [
                                                'childs' => $category->childs,
                                                'cat' => $cat,
                                                'zone_id' => request()->zone_id
                                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <li class="d-flex flex-column no-data-detail">
                                        <img class="mx-auto d-flex" src="<?php echo e(asset('admin/images/no-category.png')); ?>"
                                            alt="">
                                        <div class="data-not-found">
                                            <span><?php echo e(__('static.categories.no_category')); ?></span>
                                        </div>
                                    </li>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($categories)): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="modal fade" id="confirmationModal<?php echo e($category->id); ?>" tabindex="-1"
            aria-labelledby="confirmationModalLabel<?php echo e($category->id); ?>" aria-hidden="true">
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
                        <form action="<?php echo e(route('backend.category.destroy', $category->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn cancel" data-bs-dismiss="modal"
                                type="button"><?php echo e(__('static.cancel')); ?></button>
                            <button class="btn btn-primary delete" type="submit"><?php echo e(__('static.delete')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($childs)): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="modal fade" id="confirmationModal<?php echo e($child->id); ?>" tabindex="-1"
            aria-labelledby="confirmationModalLabel<?php echo e($child->id); ?>" aria-hidden="true">
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
                        <form action="<?php echo e(route('backend.category.destroy', $child->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn cancel" data-bs-dismiss="modal"
                                type="button"><?php echo e(__('static.cancel')); ?></button>
                            <button class="btn btn-primary delete" type="submit"><?php echo e(__('static.delete')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/category/tree.blade.php ENDPATH**/ ?>