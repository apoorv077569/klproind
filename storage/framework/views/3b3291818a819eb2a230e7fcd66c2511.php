<ul>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <li class="jstree-open"
            data-jstree="{&quot;selected&quot;:<?php if(isset($cat) && $cat->id == $child->id): ?> true <?php else: ?> false <?php endif; ?>,&quot;type&quot;:&quot;file&quot;}">
            <div class="jstree-anchor" data-bs-toggle="tooltip" data-bs-title="<?php echo e($category->title); ?>">
                <span><?php echo e($child->title); ?> (Services: <?php echo e($child->services_count ?? 0); ?>)</span>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_category.edit', $child)): ?>
                    <div class="actions">
                        <a id="edit-category" href="#">
                            <img class="edit-child" data-url=<?php echo e(route('backend.category.edit', ['category' => $child->id, 'locale' =>  request()->locale ?? app()->getlocale(), 'zone_id' => request()->zone_id])); ?> value="<?php echo e($child->id); ?>" src="<?php echo e(asset('admin/images/svg/edit-2.svg')); ?>">
                        </a>
                        <a href="#confirmationModal<?php echo e($child->id); ?>" data-bs-toggle="modal">
                            <img class="remove-icon" src="<?php echo e(asset('admin/images/svg/trash-table.svg')); ?>">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($child->childs)): ?>
                <?php echo $__env->make('backend.category.child', ['childs' => $child->childs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </li>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
</ul>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/category/child.blade.php ENDPATH**/ ?>