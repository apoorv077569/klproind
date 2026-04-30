

<?php $__env->startSection('title', __('static.users.users')); ?>

<?php $__env->startSection('content'); ?>

<div class="row g-sm-4 g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5><?php echo e(__('static.users.system_users')); ?></h5>
                <div class="btn-action">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.user.create')): ?>
                    <div class="btn-popup mb-0">
                        <a href="<?php echo e(route('backend.user.create')); ?>" class="btn"><?php echo e(__('static.users.create')); ?> </a>
                    </div>
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
                <div class="user-table">
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
    const parentContainer = document.getElementById("user-table");

    if (parentContainer) {
        let numberOfDivs = 10; // change this value if needed

        for (let i = 0; i < numberOfDivs; i++) {
            const newDiv = document.createElement("div");
            newDiv.classList.add("new-class");
            newDiv.textContent = `Div ${i + 1}`;

            parentContainer.appendChild(newDiv);
        }
    }


    // let divCounter = 0; // Track the number of divs

    // document.getElementById("addDivBtn").addEventListener("click", function() {
    //     const parentContainer = document.getElementById("user-table");
    //     const newDiv = document.createElement("div");

    //     divCounter++; // Increment counter
    //     const uniqueClass = `new-class-${divCounter}`;
    //     newDiv.classList.add(uniqueClass);
    //     newDiv.textContent = `Div ${divCounter} (Class: ${uniqueClass})`;

    //     parentContainer.appendChild(newDiv);
    // });



    (function($) {
        "use strict";

        // $('#user-table').parent('div').addClass('newClass');

        $(document).ready(function() {
            $(".credit-wallet").click(function() {
                $("input[name='type']").val("credit");
            });

            $(".debit-wallet").click(function() {
                $("input[name='type']").val("debit");
            });
        });

    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/user/index.blade.php ENDPATH**/ ?>