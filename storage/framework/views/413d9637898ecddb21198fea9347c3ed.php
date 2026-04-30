<?php use \App\Models\Zone; ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendors/flatpickr/flatpickr.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php
    $zones = Zone::where('status', true)->get();
?>


<?php $__env->startSection('title', __('static.service.services')); ?>

<?php $__env->startSection('content'); ?>
    <?php use \App\Enums\ServiceTypeEnum; ?>
    <?php use \App\Helpers\Helpers; ?>

    <?php
        $providers = Helpers::getProviders()->get();
        $services = Helpers::getAllServices();
        $categories = Helpers::getServiceCategories();
    ?>
    <div class="row g-sm-4 g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5><?php echo e(__('static.service.services')); ?></h5>
                    <div class="btn-action">
                        <button type="button" class="btn btn-outline-primary" id="applyFilter">
                            <?php echo e(__('static.report.filter')); ?> <i class="ri-filter-2-line"></i>
                        </button>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#reportExportModal">
                            <?php echo e(__('static.report.export')); ?> <i class="ri-upload-line"></i>
                        </button>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service.create')): ?>
                            <div class="btn-popup mb-0">
                                <a href="<?php echo e(route('backend.service.create')); ?>"
                                    class="btn"><?php echo e(__('static.service.create')); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service.destroy')): ?>
                            <a href="javascript:void(0);" class="btn btn-sm btn-secondary deleteConfirmationBtn"
                                style="display: none;" data-url="<?php echo e(route('backend.delete.services')); ?>">
                                <span id="count-selected-rows">0</span> <?php echo e(__('static.delete_selected')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body common-table">
                    <div class="service-table">
                        <div class="booking-select common-table-select">
                            <select class="select-2 form-control" id="zoneFilter"
                                data-placeholder="<?php echo e(__('static.notification.select_zone')); ?>">
                                <option class="select-placeholder" value=""></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <option value="<?php echo e($zone->id); ?>" <?php if(request()->zone == $zone->id): ?> selected <?php endif; ?>>
                                        <?php echo e($zone->name); ?>

                                    </option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
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
                    <form id="serviceFilterForm">
                        <div class="row g-sm-4 g-3 mb-3">
                            <div class="col-6">
                                <label class="" for="user_id"><?php echo e(__('static.daterange')); ?></label>
                                <input type="text" class="form-control" id="dateRange" placeholder="Select date range">
                                <span id="dateRangeError" class="text-danger" style="display:none;"></span>
                    
                            </div>
                            <div class="col-6">
                                <label class="" for="user_id"><?php echo e(__('static.services')); ?></label>
                                <select id="filterService" class="select-2 form-control user-dropdown Dropdown"
                                    data-placeholder="<?php echo e(__('static.notification.select_service')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($option->id); ?>"
                                            image="<?php echo e($option->getFirstMedia('thumbnail')?->getUrl()); ?>">
                                            <?php echo e($option->title); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.service.type')); ?></label>
                                <select id="filterType" class="select-2 form-control"
                                    data-placeholder="<?php echo e(__('static.service.select_type')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [ServiceTypeEnum::FIXED => Helpers::formatServiceType('fixed'), ServiceTypeEnum::PROVIDER_SITE => 'Provider Site', ServiceTypeEnum::REMOTELY => 'Remotely']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($option); ?></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class=""><?php echo e(__('static.home_pages.providers')); ?></label>
                                <select id="filterProvider" class="select-2 form-control user-dropdown Dropdown"
                                    data-placeholder="<?php echo e(__('static.home_pages.select_providers')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($option->id); ?>" sub-title="<?php echo e($option->email); ?>"
                                            image="<?php echo e($option->getFirstMedia('image')?->getUrl()); ?>"
                                            data-type="<?php echo e($option->type); ?>">
                                            <?php echo e($option->name); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class=""><?php echo e(__('static.service.zone')); ?></label>
                                <select id="filterZone" class="select-2 form-control"
                                    data-placeholder="<?php echo e(__('static.service.select_zone')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($option->id); ?>">
                                            <?php echo e($option->name); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>


                            <div class="col-6">
                                <label class=""><?php echo e(__('static.service.category')); ?></label>
                                <select id="filterCategory" class="select-2 form-control user-dropdown Dropdown"
                                    data-placeholder="<?php echo e(__('static.service.select_categories')); ?>" multiple>
                                    <option class="select-placeholder" value=""></option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <option value="<?php echo e($option->id); ?>"
                                            image="<?php echo e($option->getFirstMedia('image')?->getUrl()); ?>"
                                            data-type="<?php echo e($option->type); ?>">
                                            <?php echo e($option->title); ?>

                                        </option>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class="" for="filterStatus"><?php echo e(__('static.status')); ?></label>
                                <select name="filterStatus" id="filterStatus" class="select-2 form-control"
                                    data-placeholder="<?php echo e(__('static.provider-document.select_status')); ?>">
                                    <option class="select-placeholder" value=""></option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
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

    <form id="exportForm" method="GET" action="<?php echo e(route('backend.service.data.export')); ?>">
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
                        <button type="button" class="btn btn-outline-primary"
                            data-bs-dismiss="modal"><?php echo e(__('static.modal.close')); ?></button>
                        <button type="submit" class="btn btn-primary spinner-btn"
                            id="submitBtn"><?php echo e(__('static.modal.export')); ?></button>
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
                $('#zoneFilter').change(function() {
                    var selectedStatus = $(this).val();
                    var newUrl = "<?php echo e(route('backend.service.index')); ?>";
                    if (selectedStatus) {
                        newUrl += '?zone=' + selectedStatus;
                    }
                    // table.ajax.url(newUrl).load();
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

                    if (urlParams.has('types')) {
                        $('#filterType').val(urlParams.get('types').split(',')).trigger('change');
                    }

                    if (urlParams.has('providers')) {
                        $('#filterProvider').val(urlParams.get('providers').split(',')).trigger('change');
                    }

                    if (urlParams.has('zones')) {
                        $('#filterZone').val(urlParams.get('zones').split(',')).trigger('change');
                    }

                    if (urlParams.has('categories')) {
                        $('#filterCategory').val(urlParams.get('categories').split(',')).trigger('change');
                    }

                    if (urlParams.has('status')) {
                        $('#filterStatus').val(urlParams.get('status').split(',')).trigger('change');
                    }
                }

                function initDateRangePicker() {
                    flatpickr("#dateRange", {
                        mode: "range",
                        dateFormat: "Y-m-d",
                        onChange: function(selectedDates, dateStr) {
                            if (!dateStr) {
                                $('#dateRangeError').hide();
                            } else if (dateStr.split(' to ').length < 2) {
                                $('#dateRangeError').text(
                                    'Both start date and end date are required').show();
                            } else {
                                $('#dateRangeError').hide();
                            }
                        }
                    });
                }
                initDateRangePicker();

                $('#myModal').on('hidden.bs.modal', function() {
                    if ($('#dateRange').val() === '') {
                        $('#dateRangeError').hide();
                    }
                });

                $('#applyFilter').click(function() {
                    $('#myModal').modal('show');
                });

                $('#applyFinalFilter').click(function() {
                    let params = {};

                    let dateRange = $('#dateRange').val();
                    let services = $('#filterService').val();
                    let types = $('#filterType').val();
                    let providers = $('#filterProvider').val();
                    let zones = $('#filterZone').val();
                    let categories = $('#filterCategory').val();
                    let status = $('#filterStatus').val();

                    if (dateRange) {
                        const dates = dateRange.split(' to ');
                        params.start_date = dates[0];
                        params.end_date = dates[1];
                    }
                    if (services && services.length) params.services = services.join(',');
                    if (types && types.length) params.types = types.join(',');
                    if (providers && providers.length) params.providers = providers.join(',');
                    if (zones && zones.length) params.zones = zones.join(',');
                    if (categories && categories.length) params.categories = categories.join(',');
                    if (status && status.length) params.status = status;

                    const newUrl = new URL(window.location.href);
                    newUrl.search = new URLSearchParams(params).toString();
                    history.replaceState(null, '', newUrl.toString());

                    location.reload();
                    $('#myModal').modal('hide');
                });

                $('#reset').click(function() {
                    $('#serviceFilterForm').trigger('reset');;
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
            let types = $('#filterType').val();
            let providers = $('#filterProvider').val();
            let zones = $('#filterZone').val();
            let categories = $('#filterCategory').val();
            let status = $('#filterStatus').val();

            $(this).find('input[name], select[name]').not('#exportFormat').remove();

            if (dateRange) {
                const dates = dateRange.split(' to ');
                $(this).append(`<input type="hidden" name="start_date" value="${dates[0]}">`);
                $(this).append(`<input type="hidden" name="end_date" value="${dates[1]}">`);
            }
            if (services?.length) $(this).append(
                `<input type="hidden" name="services" value="${services.join(',')}">`);
            if (types?.length) $(this).append(`<input type="hidden" name="types" value="${types.join(',')}">`);
            if (providers?.length) $(this).append(
                `<input type="hidden" name="providers" value="${providers.join(',')}">`);
            if (zones?.length) $(this).append(`<input type="hidden" name="zones" value="${zones.join(',')}">`);
            if (categories?.length) $(this).append(
                `<input type="hidden" name="categories" value="${categories.join(',')}">`);
            if (status?.length) $(this).append(`<input type="hidden" name="status" value="${status}">`);

            setTimeout(() => {
                $('.spinner-btn').prop('disabled', false);
                $('.spinner-btn .spinner').remove();
                var modal = bootstrap.Modal.getInstance($('#reportExportModal')[0]);
                modal.hide();
            }, 3000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/service/index.blade.php ENDPATH**/ ?>