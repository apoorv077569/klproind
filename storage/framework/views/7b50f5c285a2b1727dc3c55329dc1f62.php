
<?php $__env->startPush('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendors/flatpickr/flatpickr.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', __('static.booking.all')); ?>

<?php $__env->startSection('content'); ?>
    <?php use \App\Enums\PaymentStatus; ?>
    <?php use \App\Models\BookingStatus; ?>
    <?php use \App\Helpers\Helpers; ?>
    <?php use \App\Enums\ServiceTypeEnum; ?>

    <?php
        $statuses = BookingStatus::whereNull('deleted_at')->where('status', true)->get();
        $paymentStatuses = PaymentStatus::PAYMENT_STATUS;
        $PaymentMethods = Helpers::getActivePaymentMethods() ?? [];
    ?>
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div>
                        <h5><?php echo e(__('static.booking.all')); ?></h5>
                        <h6><?php echo e(__('static.booking.total_amount')); ?>: <?php echo e(Helpers::getSettings()['general']['default_currency']->symbol); ?><span id="totalAmountValue"><?php echo e($totalAmount ?? 0); ?></span></h6>
                    </div>
                    <div class="btn-action">
                        <button type="button" class="btn btn-outline-primary" id="applyFilter">
                            <?php echo e(__('static.report.filter')); ?> <i class="ri-filter-2-line"></i>
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#reportExportModal">
                            <?php echo e(__('static.report.export')); ?> <i class="ri-upload-line"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="booking-table">
                        <div class="booking-select common-table-select">
                            <form>
                                <select class="select-2 form-control" id="bookingStatusFilter"
                                    data-placeholder="<?php echo e(__('static.booking.select_booking_status')); ?>">
                                    <option value="all" <?php if(!request()->has('status')): ?> selected <?php endif; ?>><?php echo e(__('static.booking.all')); ?></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($status?->slug); ?>"
                                            <?php if(request()->status == $status?->slug): ?> selected <?php endif; ?>><?php echo e($status?->name); ?></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <option value="<?php echo e(ServiceTypeEnum::SCHEDULED); ?>"
                                        <?php echo e(request()->status ==  ServiceTypeEnum::SCHEDULED ? 'selected' : ''); ?>>
                                        <?php echo e(ServiceTypeEnum::SCHEDULED); ?>

                                    </option>
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
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>
                </div>
                <div class="modal-body">
                    <form id="bookingFilterForm">
                        <div class="row g-sm-4 g-3 mb-3">
                            <div class="col-6">
                                <label class="" for="user_id"><?php echo e(__('static.daterange')); ?></label>
                                <input type="text" class="form-control" id="dateRange" placeholder="Select date range">
                                <span id="dateRangeError" class="text-danger" style="display:none;"></span>
                            </div>

                            <div class="col-6">
                                <label class="" for="user_id"><?php echo e(__('static.services')); ?></label>
                                <select id="filterService" class="select-2 form-control user-dropdown Dropdown" data-placeholder="<?php echo e(__('static.notification.select_service')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>                            
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?> 
                                        <option value="<?php echo e($option->id); ?>" image="<?php echo e($option->getFirstMedia('thumbnail')?->getUrl()); ?>">
                                            <?php echo e($option->title); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.consumers')); ?></label>
                                <select id="filterConsumer" class="select-2 form-control user-dropdown Dropdown" data-placeholder="<?php echo e(__('static.wallet.select_consumers')); ?>" multiple>
                                <option class="select-placeholder" value=""></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $consumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <option value="<?php echo e($option->id); ?>" sub-title="<?php echo e($option->email); ?>" image="<?php echo e($option->getFirstMedia('image')?->getUrl()); ?>">
                                        <?php echo e($option->name); ?>

                                    </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label class=""><?php echo e(__('static.home_pages.providers')); ?></label>
                                <select id="filterProvider" class="select-2 form-control user-dropdown Dropdown" data-placeholder="<?php echo e(__('static.home_pages.select_providers')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <option value="<?php echo e($option->id); ?>" sub-title="<?php echo e($option->email); ?>" image="<?php echo e($option->getFirstMedia('image')?->getUrl()); ?>">
                                        <?php echo e($option->name); ?>

                                    </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.status')); ?></label>
                                <select id="filterStatus" class="select-2 form-control" data-placeholder="<?php echo e(__('static.report.select_booking_status')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($option->id); ?>">
                                        <?php echo e($option->name); ?>

                                    </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.booking.payment_status')); ?></label>
                                <select id="filterPaymentStatus" class="select-2 form-control"  data-placeholder="<?php echo e(__('static.report.select_payment_status')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $paymentStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($paymentStatus); ?>">
                                            <?php echo e($paymentStatus); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.zone.payment_methods')); ?></label>
                                <select id="filterPaymentMethod" class="select-2 form-control"  data-placeholder="<?php echo e(__('static.zone.select_payment_methods')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $PaymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PaymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($PaymentMethod['slug']); ?>">
                                            <?php echo e($PaymentMethod['name']); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer d-flex pb-0 px-0">
                            <button type="button" class="btn btn-secondary" id="reset">
                                <i class="fa fa-undo"></i> <?php echo e(__('static.reset')); ?>

                            </button>
                            <button type="button" class="btn btn-primary" id="applyFinalFilter">
                                <i class="fa fa-filter"></i> <?php echo e(__('static.booking.apply_filter')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form id="exportForm" method="GET" action="<?php echo e(route('backend.booking.export')); ?>">
        <div class="modal fade export-modal confirmation-modal" id="reportExportModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('static.modal.export_data')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <div class="modal-body export-data">
                        <div class="main-img">
                            <img src="<?php echo e(asset('admin/images/svg/export.svg')); ?>" />
                        </div>
                        <div class="form-group">
                            <label for="exportFormat"><?php echo e(__('static.modal.select_export_format')); ?></label>
                            <select id="exportFormat" name="format" class="form-select">
                                <option value="csv"><?php echo e(__('static.modal.csv')); ?></option>
                                <option value="excel"><?php echo e(__('static.modal.excel')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal"><?php echo e(__('static.modal.close')); ?></button>
                        <button type="submit" class="btn btn-primary spinner-btn" id="submitBtn"><?php echo e(__('static.modal.export')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('admin/js/select2-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/flat-pickr/flatpickr.js')); ?>"></script>
    <?php echo $dataTable->scripts(); ?>

    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {
                if ($.validator) {
                    $.validator.setDefaults({
                        ignore: []
                    });
                }
                var table = $('#dataTableBuilder').DataTable();
                $('#bookingStatusFilter').change(function() {
                    var selectedStatus = $(this).val();
                    var newUrl = "<?php echo e(route('backend.booking.index')); ?>";
                    if (selectedStatus && selectedStatus !== 'all') {
                        newUrl += '?status=' + selectedStatus;
                    }
                    table.ajax.url(newUrl).load();
                    location.href = newUrl;
                });
            });
        })(jQuery);
    </script>
    
    <script>
        (function($) {
            "use strict";

            $(document).ready(function() {

                var table = $('#dataTableBuilder').DataTable();
                
                let urlParams = new URLSearchParams(window.location.search);

                if (urlParams.toString()) {
                
                    if (urlParams.has('start_date') && urlParams.has('end_date')) {
                        $('#dateRange').val(urlParams.get('start_date') + " to " + urlParams.get('end_date'));
                    }
                
                    if (urlParams.has('services')) {
                        $('#filterService').val(urlParams.get('services').split(',')).trigger('change');
                    }
                
                    if (urlParams.has('consumers')) {
                        $('#filterConsumer').val(urlParams.get('consumers').split(',')).trigger('change');
                    }
                
                    if (urlParams.has('providers')) {
                        $('#filterProvider').val(urlParams.get('providers').split(',')).trigger('change');
                    }
                
                    if (urlParams.has('statuses')) {
                        $('#filterStatus').val(urlParams.get('statuses').split(',')).trigger('change');
                    }
                
                    if (urlParams.has('payment_statuses')) {
                        $('#filterPaymentStatus').val(urlParams.get('payment_statuses').split(',')).trigger('change');
                    }
                
                    if (urlParams.has('payment_methods')) {
                        $('#filterPaymentMethod').val(urlParams.get('payment_methods').split(',')).trigger('change');
                    }
                }

                function initDateRangePicker(){
                    flatpickr("#dateRange", {
                        mode: "range",
                        dateFormat: "Y-m-d",
                        onChange: function(selectedDates, dateStr) {
                            if(!dateStr){
                                $('#dateRangeError').hide();
                            }
                            else if(dateStr.split(' to ').length < 2) {
                                $('#dateRangeError').text('Both start date and end date are required').show();
                            } else {
                                $('#dateRangeError').hide();
                            }
                        }
                    });
                } 
                initDateRangePicker();

                $('#myModal').on('hidden.bs.modal', function () {
                    if ($('#dateRange').val() === '') {
                        $('#dateRangeError').hide();
                    }
                });

                $('#applyFilter').click(function () {
                    $('#myModal').modal('show');
                });

                $('#applyFinalFilter').click(function () {
                    let params = {};

                    let dateRange = $('#dateRange').val();
                    let services = $('#filterService').val();
                    let consumers = $('#filterConsumer').val();
                    let providers = $('#filterProvider').val();
                    let statuses = $('#filterStatus').val();
                    let paymentStatuses = $('#filterPaymentStatus').val();
                    let paymentMethods = $('#filterPaymentMethod').val();

                    if (dateRange) {
                        const dates = dateRange.split(' to ');
                        params.start_date = dates[0];
                        params.end_date = dates[1];
                    }                    
                    if (services && services.length) params.services = services.join(',');
                    if (consumers && consumers.length) params.consumers = consumers.join(',');
                    if (providers && providers.length) params.providers = providers.join(',');
                    if (statuses && statuses.length) params.statuses = statuses.join(',');
                    if (paymentStatuses && paymentStatuses.length) params.payment_statuses = paymentStatuses.join(',');
                    if (paymentMethods && paymentMethods.length) params.payment_methods = paymentMethods.join(',');

                    const newUrl = new URL(window.location.href);
                    newUrl.search = new URLSearchParams(params).toString();
                    history.replaceState(null, '', newUrl.toString());

                    location.reload();
                    $('#myModal').modal('hide');
                });

                $('#reset').click(function () {
                    $('#bookingFilterForm').trigger('reset'); ;
                    $('.select-2').val(null).trigger('change');
                    $('#dateRange').val('');

                    history.replaceState(null, '', baseUrl);

                    table.ajax.url(baseUrl).load();
                    $('#myModal').modal('hide');
                });

            });
        })(jQuery);
    </script>
    
    <script>
        $('#exportForm').on('submit', function(e) {

            let dateRange = $('#dateRange').val();
            let services = $('#filterService').val();
            let consumers = $('#filterConsumer').val();
            let providers = $('#filterProvider').val();
            let statuses = $('#filterStatus').val();
            let paymentStatuses = $('#filterPaymentStatus').val();
            let paymentMethods = $('#filterPaymentMethod').val();

            $(this).find('input[name], select[name]').not('#exportFormat').remove();

            if(dateRange){
                const dates = dateRange.split(' to ');
                $(this).append(`<input type="hidden" name="start_date" value="${dates[0]}">`);
                $(this).append(`<input type="hidden" name="end_date" value="${dates[1]}">`);
            }
            if(services?.length) $(this).append(`<input type="hidden" name="services" value="${services.join(',')}">`);
            if(consumers?.length) $(this).append(`<input type="hidden" name="consumers" value="${consumers.join(',')}">`);
            if(providers?.length) $(this).append(`<input type="hidden" name="providers" value="${providers.join(',')}">`);
            if(statuses?.length) $(this).append(`<input type="hidden" name="statuses" value="${statuses.join(',')}">`);
            if(paymentStatuses?.length) $(this).append(`<input type="hidden" name="payment_statuses" value="${paymentStatuses.join(',')}">`);
            if(paymentMethods?.length) $(this).append(`<input type="hidden" name="payment_methods" value="${paymentMethods.join(',')}">`);

            setTimeout(() => {
                $('.spinner-btn').prop('disabled', false);
                $('.spinner-btn .spinner').remove();
                var modal = bootstrap.Modal.getInstance($('#reportExportModal')[0]);
                modal.hide();
            }, 3000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/booking/index.blade.php ENDPATH**/ ?>