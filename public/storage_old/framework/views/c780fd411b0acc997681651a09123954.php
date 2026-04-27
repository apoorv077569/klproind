<?php use \App\Models\Booking; ?>
<?php use \App\Models\CommissionHistory; ?>
<?php use \app\Helpers\Helpers; ?>
<?php use \App\Enums\BookingEnum; ?>
<?php use \App\Enums\BookingEnumSlug; ?>
<?php use \App\Enums\SymbolPositionEnum; ?>

<?php $__env->startSection('title', __('static.dashboard.dashboard')); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/flatpickr.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php
    $dateRange = Helpers::getStartAndEndDate(request('sort'), request('start'), request('end'));
    $start_date = $dateRange['start'] ?? null;
    $end_date = $dateRange['end'] ?? null;
?>

<?php $__env->startSection('content'); ?>
        <div class="main-dashboard-box">
        <div class="row g-sm-4 g-3">
            <div class="col-12 text-end">
                <form action="" method="GET" id="sort-form" class="dashboard-short-form">
                    <div class="short-box">
                        <label class="form-label">Sort by</label>
                        <select class="form-select" id="sort" name="sort">
                            <option class="select-placeholder" value="today"
                                <?php echo e(request('sort') == 'today' ? 'selected' : ''); ?>>
                                <?php echo e(__('static.today')); ?>

                            </option>
                            <option class="select-placeholder" value="this_week"
                                <?php echo e(request('sort') == 'this_week' ? 'selected' : ''); ?>>
                                <?php echo e(__('static.this_week')); ?>

                            </option>
                            <option class="select-placeholder" value="this_month"
                                <?php echo e(request('sort') == 'this_month' ? 'selected' : ''); ?>>
                                <?php echo e(__('static.this_month')); ?>

                            </option>
                            <option class="select-placeholder" value="this_year"
                                <?php echo e(request('sort') == 'this_year' || !request('sort') ? 'selected' : ''); ?>>
                                <?php echo e(__('static.this_year')); ?>

                            </option>
                            <option class="select-placeholder" value="custom"
                                <?php echo e(request('sort') == 'custom' ? 'selected' : ''); ?>>
                                <?php echo e(__('static.custom_range')); ?>

                            </option>
                        </select>
                    </div>
                    <div class="form-group custom-date-range d-none" id="custom-date-range">
                        <label for="start_end_date"><?php echo e(__('static.report.select_date')); ?></label>
                        <input type="text" class="form-control filter-dropdown" id="start_end_date" name="start_end_date"
                            placeholder="<?php echo e(__('static.service_package.select_date')); ?>"
                            value="<?php echo e(request('sort') == 'custom' && $start_date && $end_date ? $start_date->format('d-m-Y') . ' to ' . $end_date->format('d-m-Y') : ''); ?>">
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="row g-sm-4 g-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                        <div class="col-xxl-4 col-md-6">
                            <div class="welcome-box">
                                <div class="top-box">
                                    <img src="<?php echo e(asset('admin/images/welcome-shape.svg')); ?>" class="shape" alt="">
                                </div>
                                <div class="user-image">
                                    <img src="<?php echo e(asset('admin/images/avatar/gradient-circle.svg')); ?>" class="circle"
                                        alt="">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Auth::user()->getFirstMediaUrl('image')): ?>
                                        <img class="img-fluid" src="<?php echo e(Auth::user()->getFirstMediaUrl('image')); ?>"
                                            alt="header-user">
                                    <?php else: ?>
                                        <div class="initial-letter"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-check check-icon">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </div>

                                <div class="user-details">
                                    <h3><?php echo e(__('static.hello')); ?>, <?php echo e(Auth::user()->name); ?>.</h3>
                                    <p><?php echo e(__('static.welcome_to_admin_clan')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                   <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['serviceman'])): ?>
                        <div class="col-xxl-2 col-md-3 col-sm-6">
                            <a href="<?php echo e(route('backend.serviceman.index')); ?>">
                                <div class="total-box color-1">
                                    <div class="top-box">
                                        <svg>
                                            <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#servicemen')); ?>">
                                            </use>
                                        </svg>
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="<?php echo e(__('static.dashboard.total_servicemen')); ?>">
                                            <h4><?php echo e(Helpers::getTotalServicemen($start_date, $end_date)); ?></h4>
                                            <h6><?php echo e(__('static.dashboard.total_servicemen')); ?></h6>
                                        </div>
                                    </div>

                                    <div id="servicemen-chart"></div>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalServicemenPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                                        <div class="bottom-box down">
                                            <svg>
                                                <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>">
                                                </use>
                                            </svg>
                                            <span>
                                            <?php else: ?>
                                                <div class="bottom-box up">
                                                    <svg>
                                                        <use
                                                            xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>">
                                                        </use>
                                                    </svg>
                                                    <span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalServicemenPercentage($start_date, $end_date)['percentage'])); ?> </span>
                                </div>
                        </div>
                        </a>
                    </div>
                   <?php endif; ?>

                <!-- <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['provider', 'serviceman'])): ?>
                    <div class="col-xxl-2 col-md-3 col-sm-6">
                        <a href="<?php echo e(route('backend.provider.index')); ?>">
                            <div class="total-box color-5">
                                <div class="top-box">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#verified-provider')); ?>">
                                        </use>
                                    </svg>
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Providers">
                                        <h4><?php echo e(Helpers::getTotalProviders($start_date, $end_date)); ?></h4>
                                        <h6><?php echo e(__('static.dashboard.providers')); ?></h6>
                                    </div>
                                </div>

                                <div id="verified-chart"></div>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalProvidersPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                                    <div class="bottom-box down">
                                        <svg>
                                            <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                        </svg>
                                        <span>
                                        <?php else: ?>
                                            <div class="bottom-box up">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>">
                                                    </use>
                                                </svg>
                                                <span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalProvidersPercentage($start_date, $end_date)['percentage'])); ?></span>
                            </div>
                    </div>
                    </a>
                </div>
                <?php endif; ?> -->

           <!-- <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['serviceman'])): ?>
                <div class="col-xxl-2 col-md-3 col-sm-6">
                    <a href="<?php echo e(route('backend.withdraw-request.index')); ?>">
                        <div class="total-box color-3">
                            <div class="top-box">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#providers')); ?>">
                                    </use>
                                </svg>
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Provider Withdraw">
                                    <h4><?php echo e(Helpers::getProviderWithdraw($start_date, $end_date)); ?></h4>
                                    <h6><?php echo e(__('static.dashboard.provider_withdraw')); ?></h6>
                                </div>
                            </div>

                            <div id="provider-chart"></div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getProviderWithdrawPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                                <div class="bottom-box down">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                    </svg>
                                    <span>
                                    <?php else: ?>
                                        <div class="bottom-box up">
                                            <svg>
                                                <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>">
                                                </use>
                                            </svg>
                                            <span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php echo e(Helpers::formatDashboardPercentage(Helpers::getProviderWithdrawPercentage($start_date, $end_date)['percentage'])); ?></span>
                        </div>
                </div>
                </a>
            </div>
            <?php endif; ?> -->
        <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['provider'])): ?>
            <div class="col-xxl-2 col-md-3 col-sm-6">
                <a href="<?php echo e(route('backend.serviceman-withdraw-request.index')); ?>">
                    <div class="total-box color-2">
                        <div class="top-box">
                            <svg>
                                <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#service-withdrow')); ?>">
                                </use>
                            </svg>
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                                data-bs-title="Provider Withdraw">
                                <h4><?php echo e(Helpers::getServicemanWithdraw($start_date, $end_date)); ?></h4>
                                <h6><?php echo e(__('static.dashboard.serviceman_withdraw')); ?></h6>
                            </div>
                        </div>

                        <div class="progress-box">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%">
                                </div>
                            </div>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getServicemanWithdrawPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                            <div class="bottom-box down">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                </svg>
                                <span>
                                <?php else: ?>
                                    <div class="bottom-box up">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>">
                                        </use>
                                    </svg>
                                    <span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php echo e(Helpers::formatDashboardPercentage(Helpers::getServicemanWithdrawPercentage($start_date, $end_date)['percentage'])); ?></span>
                    </div>
                </div>
                </a>
            </div>
        <?php endif; ?>

    <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['serviceman'])): ?>
        <div class="col-xxl-2 col-md-3 col-sm-6">
            <a href="<?php echo e(route('backend.service.index')); ?>">
                <div class="total-box color-3">
                    <div class="top-box">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#service')); ?>">
                            </use>
                        </svg>
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Services">
                            <h4><?php echo e(Helpers::getServicesCount($start_date, $end_date)); ?></h4>
                            <h6><?php echo e(__('static.dashboard.services')); ?></h6>
                        </div>
                    </div>

                    <div id="service-chart"></div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalServicesPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                        <div class="bottom-box down">
                            <svg>
                                <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                            </svg>
                            <span>
                            <?php else: ?>
                                <div class="bottom-box up">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                    </svg>
                                    <span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalServicesPercentage($start_date, $end_date)['percentage'])); ?></span>
                </div>
        </div>
        </a>
        </div>
    <?php endif; ?>

    <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['provider'])): ?>
        <div class="col-xxl-2 col-md-3 col-sm-6">
            <a href="<?php echo e(route('backend.review.index')); ?>">

                <div class="total-box color-4">
                    <div class="top-box">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#reviews')); ?>">
                            </use>
                        </svg>
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Reviews">
                            <h4><?php echo e(Helpers::getReviewsCount($start_date, $end_date)); ?></h4>
                            <h6><?php echo e(__('static.dashboard.reviews')); ?></h6>
                        </div>
                    </div>

                    <div id="review-chart"></div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalReviewsPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                        <div class="bottom-box down">
                            <svg>
                                <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                            </svg>
                            <span>
                            <?php else: ?>
                                <div class="bottom-box up">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                    </svg>
                                    <span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalReviewsPercentage($start_date, $end_date)['percentage'])); ?></span>
                </div>
        </div>
        </a>
        </div>
    <?php endif; ?>

    <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['provider', 'admin'])): ?>
        <div class="col-xxl-2 col-md-3 col-sm-6">

            <div class="total-box color-4">
                <div class="top-box">
                    <svg>
                        <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#reviews')); ?>"></use>
                    </svg>
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Wallet">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                            <h4><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(isset(auth()->user()->servicemanWallet) ? auth()->user()->servicemanWallet->balance : 0.0); ?></h4>
                        <?php else: ?>
                            <h4><?php echo e(isset(auth()->user()->servicemanWallet) ? auth()->user()->servicemanWallet->balance : 0.0); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></h4>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h6><?php echo e(__('static.dashboard.Wallet')); ?></h6>
                    </div>
                </div>

                <div id="review-chart-2"></div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalReviewsPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                    <div class="bottom-box down">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                        </svg>
                        <span>
                        <?php else: ?>
                            <div class="bottom-box up">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                </svg>
                                <span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalReviewsPercentage($start_date, $end_date)['percentage'])); ?></span>
            </div>
        </div>
        </div>
    <?php endif; ?>

    <div class="col-xxl-2 col-md-3 col-sm-6">
        <a href="<?php echo e(route('backend.commission.index')); ?>">

            <div class="total-box color-5">
                <div class="top-box">
                    <svg>
                        <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#online-payment')); ?>">
                        </use>
                    </svg>
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Online Payment <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::getTotalPayment($start_date, $end_date)); ?>" >
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                            <h4><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::getTotalPayment($start_date, $end_date)); ?></h4>
                        <?php else: ?>
                            <h4><?php echo e(Helpers::getTotalPayment($start_date, $end_date)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></h4>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h6><?php echo e(__('static.dashboard.online_payment')); ?></h6>
                    </div>
                </div>

                <div id="onlinePayment-chart"></div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalPaymentPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                    <div class="bottom-box down">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                        </svg>
                        <span>
                        <?php else: ?>
                            <div class="bottom-box up">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                </svg>
                                <span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalPaymentPercentage($start_date, $end_date)['percentage'])); ?></span>
            </div>
    </div>
    </a>
    </div>
    <div class="col-xxl-2 col-md-3 col-sm-6">
        <a href="<?php echo e(route('backend.commission.index')); ?>">

            <div class="total-box color-6">
                <div class="top-box">
                    <svg>
                        <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#offline-payment')); ?>">
                        </use>
                    </svg>
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Offline Payment <?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::getTotalPayment($start_date, $end_date, 'cash')); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                            <h4><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(Helpers::getTotalPayment($start_date, $end_date, 'cash')); ?></h4>
                        <?php else: ?>
                            <h4><?php echo e(Helpers::getTotalPayment($start_date, $end_date, 'cash')); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></h4>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h6><?php echo e(__('static.dashboard.offline_payment')); ?></h6>
                    </div>
                </div>

                <div id="offline-payment-chart"></div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalPaymentPercentage($start_date, $end_date, 'cash')['status'] == 'decrease'): ?>
                    <div class="bottom-box down">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                        </svg>
                        <span>
                        <?php else: ?>
                            <div class="bottom-box up">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                </svg>
                                <span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalPaymentPercentage($start_date, $end_date, 'cash')['percentage'])); ?></span>
            </div>
    </div>
    </a>
    </div>

    <div class="col-xxl-2 col-md-3 col-sm-6">
        <a href="<?php echo e(route('backend.booking.index')); ?>">

            <div class="total-box color-7">
                <div class="top-box">
                    <svg>
                        <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#booking')); ?>">
                        </use>
                    </svg>
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Booking">
                        <h4><?php echo e(Helpers::getTotalBookings($start_date, $end_date)); ?></h4>
                        <h6><?php echo e(__('static.dashboard.booking')); ?></h6>
                    </div>
                </div>

                <div class="progress-box">
                    <div class="progress progress-info">
                        <div class="progress-bar" style="width: 75%">
                        </div>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalBookingPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                    <div class="bottom-box down">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                        </svg>
                        <span>
                        <?php else: ?>
                            <div class="bottom-box up">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                </svg>
                                <span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalBookingPercentage($start_date, $end_date)['percentage'])); ?></span>
            </div>
    </div>
    </a>
    </div>
    <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['provider', 'serviceman'])): ?>
        <div class="col-xxl-2 col-md-3 col-sm-6">
            <a href="<?php echo e(route('backend.customer.index')); ?>">

                <div class="total-box color-1">
                    <div class="top-box">
                        <svg>
                            <use xlink:href="<?php echo e(asset('admin/images/svg/total-service.svg#customers')); ?>">
                            </use>
                        </svg>
                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Customers">
                            <h4><?php echo e(Helpers::getTotalCustomers($start_date, $end_date)); ?></h4>
                            <h6><?php echo e(__('static.dashboard.customers')); ?></h6>
                        </div>
                    </div>

                    <div id="customers-chart"></div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getTotalCustomersPercentage($start_date, $end_date)['status'] == 'decrease'): ?>
                        <div class="bottom-box down">
                            <svg>
                                <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                            </svg>
                            <span>
                            <?php else: ?>
                                <div class="bottom-box up">
                                    <svg>
                                        <use xlink:href="<?php echo e(asset('admin/images/svg/down-arrow-1.svg#downArrow')); ?>"></use>
                                    </svg>
                                    <span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php echo e(Helpers::formatDashboardPercentage(Helpers::getTotalCustomersPercentage($start_date, $end_date)['percentage'])); ?></span>
                </div>
        </div>
        </a>
        </div>
    <?php endif; ?>

    </div>
    </div>

    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-body">
                <div
                    class="dashboard-box-list-2 row row-cols-xxl-6 row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gx-0 gy-lg-4 gy-3">
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::PENDING])); ?>"
                            class="dashboard-box box-color-1">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.pending')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::PENDING, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::ON_GOING])); ?>"
                            class="dashboard-box box-color-2">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.on_going')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::ON_GOING, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::ON_THE_WAY])); ?>"
                            class="dashboard-box box-color-3">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.on_the_way')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::ON_THE_WAY, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::COMPLETED])); ?>"
                            class="dashboard-box box-color-4">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.completed')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::COMPLETED, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::CANCEL])); ?>"
                            class="dashboard-box box-color-5">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.cancel')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::CANCEL, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('backend.booking.index', ['status' => BookingEnumSlug::ON_HOLD])); ?>"
                            class="dashboard-box box-color-6">
                            <div class="svg-icon">
                                <svg>
                                    <use xlink:href="<?php echo e(asset('admin/images/svg/box-2.svg#box-2')); ?>"></use>
                                </svg>
                            </div>
                            <div>
                                <h5><?php echo e(__('static.booking.on_hold')); ?></h5>
                                <h3><?php echo e(Booking::countByStatus($bookings, BookingEnum::ON_HOLD, $start_date, $end_date)); ?>

                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row g-sm-4 g-3">
            <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['serviceman'])): ?>
                <div class="col-sm-4">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h4><?php echo e(__('static.dashboard.service_types')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div id="service-pie-chart" class="service-pie-chart"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (! \Illuminate\Support\Facades\Blade::check('role', ['serviceman'])): ?>
                <div class="col-sm-8">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h4><?php echo e(__('static.dashboard.top_services')); ?></h4>
                            <a href="<?php echo e(route('backend.service.index')); ?>">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table top-service-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('static.dashboard.name')); ?></th>
                                             <th><?php echo e(__('static.dashboard.provider')); ?></th>
                                            <th><?php echo e(__('static.dashboard.bookings')); ?></th>
                                            <th><?php echo e(__('static.dashboard.type')); ?></th>
                                            <th><?php echo e(__('static.dashboard.ratings')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $services->paginate(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <tr>
                                                <td>
                                                    <div class="service-details-box">
                                                        <img src="<?php echo e($service?->media?->first()?->getUrl() ?? asset('admin/images/service/1.png')); ?>"
                                                            class="img-fluid service-image" alt="">
                                                        <div class="service-details">
                                                            <h5><?php echo e($service->title); ?></h5>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                                <h6><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(number_format($service->price, 2)); ?>

                                                            <?php else: ?>
                                                                <h6><?php echo e(number_format($service->price, 2)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?>    
                                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                 <td>
                                                    <div class="service-details-box">
                                                        <?php
                                                            $serviceman = $service->bookings->flatMap->servicemen->first();
                                                            $media = $serviceman?->getFirstMedia('image');
                                                            $imageUrl = $media ? $media->getUrl() : null;
                                                        ?>

                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                            <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                                class="img-fluid service-image rounded-circle">
                                                        <?php else: ?>
                                                            <div class="initial-letter">
                                                                <?php echo e($serviceman ? strtoupper(substr($serviceman->name, 0, 1)) : '?'); ?></div>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                        <div class="service-details">
                                                            <h5><?php echo e($serviceman?->name ?? 'No Serviceman'); ?></h5>
                                                            <h6><?php echo e($serviceman?->email ?? ''); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo e($service->bookings_count); ?></td>
                                                <td><?php echo e($service->type); ?></td>
                                                <td>
                                                    <div class="rating">
                                                        <img src="<?php echo e(asset('admin/images/svg/star.svg')); ?>"
                                                            class="img-fluid" alt="">
                                                        <h6><?php echo e(number_format($service->rating_count, 1)); ?></h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <div class="no-table-data">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('admin/images/no-table-data-2.svg#no-data')); ?>">
                                                    </use>
                                                </svg>
                                                <p><?php echo e(__('static.dashboard.data_not_found')); ?></p>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (! \Illuminate\Support\Facades\Blade::check('role', 'provider|serviceman')): ?>
                <div class="col-sm-5">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h4><?php echo e(__('static.dashboard.top_providers')); ?></h4>
                            <a href="<?php echo e(route('backend.provider.index')); ?>">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table top-providers-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('static.dashboard.name')); ?></th>
                                            <th><?php echo e(__('static.dashboard.type')); ?></th>
                                            <th><?php echo e(__('static.dashboard.bookings')); ?></th>
                                            <th><?php echo e(__('static.dashboard.experience')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $topServicemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <tr>
                                                <td>
                                                    <div class="service-details-box">
                                                        <?php
                                                            $media = $provider?->getFirstMedia('image');
                                                            $imageUrl = $media ? $media->getUrl() : null;
                                                        ?>

                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                            <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                                class="img-fluid service-image rounded-circle">
                                                        <?php else: ?>
                                                            <div class="initial-letter">
                                                                <?php echo e(strtoupper(substr($provider?->name, 0, 1))); ?></div>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                        <div class="service-details">
                                                            <h5><?php echo e($provider?->name); ?></h5>
                                                            <h6><?php echo e($provider?->email); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Provider</td>

                                                <td><?php echo e($provider?->servicemen_bookings_count); ?></td>
                                                <td><?php echo e($provider?->experience_duration); ?>+
                                                    <?php echo e($provider?->experience_interval); ?>

                                                </td>

                                            </tr>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <div class="no-table-data">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('admin/images/no-table-data-2.svg#no-data')); ?>">
                                                    </use>
                                                </svg>
                                                <p><?php echo e(__('static.dashboard.data_not_found')); ?></p>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'provider')): ?>
                <div class="col-sm-5">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <h4><?php echo e(__('static.dashboard.top_servicemen')); ?></h4>
                            <a href="<?php echo e(route('backend.serviceman.index')); ?>">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table top-providers-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('static.dashboard.name')); ?></th>
                                            <th><?php echo e(__('static.dashboard.ratings')); ?></th>
                                            <th><?php echo e(__('static.dashboard.experience')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $topServicemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Serviceman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                            <tr>
                                                <td>
                                                    <div class="service-details-box">
                                                        <?php
                                                            $media = $Serviceman?->getFirstMedia('image');
                                                            $imageUrl = $media ? $media->getUrl() : null;
                                                        ?>

                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                            <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                                class="img-fluid service-image rounded-circle">
                                                        <?php else: ?>
                                                            <div class="initial-letter">
                                                                <?php echo e(strtoupper(substr($Serviceman?->name, 0, 1))); ?></div>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                        <div class="service-details">
                                                            <h5><?php echo e($Serviceman?->name); ?></h5>
                                                            <h6><?php echo e($Serviceman?->email); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($Serviceman->ServicemanReviewRatings)): ?>
                                                        <div class="rate">
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < Helpers::getServicemanReviewRatings($Serviceman); ++$i): ?>
                                                                <img src="<?php echo e(asset('admin/images/svg/star.svg')); ?>"
                                                                    alt="star" class="img-fluid star">
                                                            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                            <small>(<?php echo e($Serviceman->ServicemanReviewRatings); ?>)</small>
                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </td>
                                                <td><?php echo e($Serviceman?->experience_duration); ?>+
                                                    <?php echo e($Serviceman?->experience_interval); ?> </td>
                                            </tr>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <div class="no-table-data">
                                                <svg>
                                                    <use
                                                        xlink:href="<?php echo e(asset('admin/images/no-table-data-2.svg#no-data')); ?>">
                                                    </use>
                                                </svg>
                                                <p><?php echo e(__('static.dashboard.data_not_found')); ?></p>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="col-sm-7">
                <div class="dashboard-card">
                    <div class="card-title">
                        <h4><?php echo e(__('static.dashboard.revenue')); ?></h4>
                        <ul class="chart-list">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'provider')): ?>
                                <li>
                                    <span class="color-1"></span>
                                    <?php echo e(__('static.dashboard.provider')); ?>

                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                                <li>
                                    <span class="color-2"></span>
                                    <?php echo e(__('static.dashboard.admin')); ?>

                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if (\Illuminate\Support\Facades\Blade::check('role', 'serviceman')): ?>
                                <li>
                                    <span class="color-3"></span>
                                    <?php echo e(__('static.dashboard.serviceman')); ?>

                                </li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div id="revenue-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="dashboard-card">
                    <div class="card-title">
                        <h4><?php echo e(__('static.dashboard.recent_booking')); ?></h4>
                        <a href="<?php echo e(route('backend.booking.index')); ?>">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table recent-booking-table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('static.dashboard.booking_id')); ?></th>
                                        <th><?php echo e(__('static.dashboard.service')); ?></th>
                                        <th><?php echo e(__('static.dashboard.provider')); ?></th>
                                        <th><?php echo e(__('static.dashboard.status')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $bookings->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <tr>
                                            <td>
                                                <span class="badge badge-booking">#<?php echo e($booking?->booking_number); ?></span>
                                            </td>

                                            <td>
                                                <div class="service-details-box">
                                                    <?php
                                                        $media = $booking?->service?->getFirstMedia('image');
                                                        $imageUrl = $media ? $media->getUrl() : null;
                                                    ?>

                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                        <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                            class="img-fluid service-image">
                                                    <?php else: ?>
                                                        <div class="initial-letter">
                                                            <?php echo e(strtoupper(substr($booking?->service?->title, 0, 1))); ?>

                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                    <div class="service-details">

                                                        <h5><?php echo e($booking?->service?->title); ?></h5>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                            <h6><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(number_format($booking?->service?->price, 2)); ?></h6>
                                                        <?php else: ?>
                                                            <h6><?php echo e(number_format($booking?->service?->price, 2)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></h6>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="service-details-box">
                                                    <?php
                                                        $serviceman = $booking?->servicemen?->first();
                                                        $media = $serviceman?->getFirstMedia('image');
                                                        $imageUrl = $media ? $media->getUrl() : null;
                                                    ?>

                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                        <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                            class="img-fluid service-image rounded-circle">
                                                    <?php else: ?>
                                                        <div class="initial-letter">
                                                            <?php echo e($serviceman ? strtoupper(substr($serviceman->name, 0, 1)) : '?'); ?>

                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                    <div class="service-details">
                                                        <h5><?php echo e($serviceman?->name ?? 'No Serviceman'); ?></h5>
                                                        <h6><?php echo e($serviceman?->email ?? ''); ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($booking->sub_bookings)): ?>
                                                    <span
                                                        class="badge booking-status-<?php echo e($booking->sub_bookings?->first()?->booking_status?->color_code); ?>"><?php echo e($booking->sub_bookings?->first()?->booking_status?->name); ?></span>
                                                <?php elseif(isset($booking->booking_status?->color_code)): ?>
                                                    <span
                                                        class="badge booking-status-<?php echo e($booking->booking_status?->color_code); ?>"><?php echo e($booking->booking_status?->name); ?></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                        <div class="no-table-data">
                                            <svg>
                                                <use
                                                    xlink:href="<?php echo e(asset('admin/images/no-table-data-2.svg#no-data')); ?>">
                                                </use>
                                            </svg>
                                            <p><?php echo e(__('static.dashboard.data_not_found')); ?></p>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="dashboard-card">
                    <div class="card-title">
                        <h4><?php echo e(__('static.dashboard.latest_reviews')); ?></h4>
                        <a href="<?php echo e(route('backend.review.index')); ?>">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table recent-withdraw-requests-table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('static.dashboard.service')); ?></th>
                                        <th class="text-start"><?php echo e(__('static.dashboard.consumer')); ?></th>
                                        <th><?php echo e(__('static.dashboard.ratings')); ?></th>
                                        <th><?php echo e(__('static.dashboard.created_at')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                                        <tr>
                                            <td>
                                                <div class="service-details-box">
                                                    <?php
                                                        $media = $review?->service?->getFirstMedia('image');
                                                        $imageUrl = $media ? $media->getUrl() : null;
                                                    ?>

                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                        <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                            class="img-fluid service-image">
                                                    <?php else: ?>
                                                        <div class="initial-letter">
                                                            <?php echo e(strtoupper(substr($review?->service?->title, 0, 1))); ?>

                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                    <div class="service-details">
                                                        <h5><?php echo e($review?->service?->title); ?></h5>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>
                                                            <h6><?php echo e(Helpers::getDefaultCurrencySymbol()); ?><?php echo e(number_format($review?->service?->price, 2)); ?></h6>
                                                        <?php else: ?>
                                                            <h6><?php echo e(number_format($review?->service?->price, 2)); ?> <?php echo e(Helpers::getDefaultCurrencySymbol()); ?></h6>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="service-details-box">
                                                    <?php
                                                        $media = $review?->consumer?->getFirstMedia('image');
                                                        $imageUrl = $media ? $media->getUrl() : null;
                                                    ?>

                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                                                        <img src="<?php echo e($imageUrl); ?>" alt="Image"
                                                            class="img-fluid service-image rounded-circle">
                                                    <?php else: ?>
                                                        <div class="initial-letter">
                                                            <?php echo e(strtoupper(substr($review?->consumer?->name, 0, 1))); ?>

                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                    <div class="service-details">
                                                        <h5><?php echo e($review?->consumer?->name); ?></h5>
                                                        <h6><?php echo e($review?->consumer?->email); ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="rate justify-content-center gap-1">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $review?->rating; ++$i): ?>
                                                        <img src="<?php echo e(asset('admin/images/svg/star.svg')); ?>"
                                                            alt="star" class="img-fluid star">
                                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    <small>(<?php echo e($review?->rating); ?>)</small>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo e(date('d-M-Y', strtotime($review->created_at))); ?>

                                            </td>
                                        </tr>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                        <div class="no-table-data">
                                            <svg>
                                                <use
                                                    xlink:href="<?php echo e(asset('admin/images/no-table-data-2.svg#no-data')); ?>">
                                                </use>
                                            </svg>
                                            <p><?php echo e(__('static.dashboard.data_not_found')); ?></p>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('admin/js/apex-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom-apexchart.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom-flatpickr.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            const filterVal = $('#sort').val();
            if (filterVal === 'custom') {
                $('#custom-date-range').removeClass('d-none');
            } else {
                $('#custom-date-range').addClass('d-none');
            }

            // Set date picker to URL dates when sort=custom and start/end are in URL
            var urlStart = <?php echo json_encode(request('start'), 15, 512) ?>;
            var urlEnd = <?php echo json_encode(request('end'), 15, 512) ?>;
            if (filterVal === 'custom' && urlStart && urlEnd && document.querySelector('#start_end_date')._flatpickr) {
                document.querySelector('#start_end_date')._flatpickr.setDate([urlStart, urlEnd]);
            }

            function formatDate(date) {
                const parts = date.split('/');
                if (parts.length === 3) {
                    return `${parts[0]}-${parts[1]}-${parts[2]}`;
                }
                return date;
            }

            $('#start_end_date').on('change', function() {

                const selectedDateRange = $(this).val();

                if (selectedDateRange) {
                    const dateRange = selectedDateRange.split(' to ');

                    if (dateRange.length === 2) {
                        const startDate = formatDate(dateRange[0]);
                        const endDate = formatDate(dateRange[1]);
                        const urlParams = new URLSearchParams(window.location.search);
                        urlParams.set('sort', 'custom');
                        urlParams.set('start', startDate);
                        urlParams.set('end', endDate);


                        window.location.href = `${window.location.pathname}?${urlParams.toString()}`;
                    }
                }
            });

            $('#sort').on('change', function() {

                const selectedSort = $(this).val();

                if (selectedSort === 'custom') {
                    $('#custom-date-range').removeClass('d-none');
                } else {
                    window.history.replaceState(null, null, location.pathname);
                    $('#custom-date-range').addClass('d-none');
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('sort', selectedSort);
                    window.location.href = `${window.location.pathname}?${urlParams.toString()}`;
                }
            });
            var serviceTypeCounts = <?php echo json_encode(Helpers::getServiceTypeCount($start_date, $end_date)['series']); ?>;
            var TotalServiceCount = <?php echo Helpers::getServicesCount($start_date, $end_date); ?>


            var servicePieChart = {
                series: serviceTypeCounts,
                labels: ["User Site", "Remotely", "Provider Site"],
                chart: {
                    height: 338,
                    type: "donut",
                },
                plotOptions: {
                    pie: {
                        expandOnClick: false,
                        donut: {
                            size: "75%",
                            background: '#F4F6F2',

                            labels: {
                                show: true,
                                name: {
                                    offsetY: -1,
                                },
                                value: {
                                    fontSize: "14px",
                                    offsetY: 10,
                                    fontFamily: "var(--font-family)",
                                    fontWeight: 400,
                                    color: "#52526C",
                                },
                                total: {
                                    show: true,
                                    fontSize: "20px",
                                    offsetY: -1,
                                    fontWeight: 500,
                                    fontFamily: "var(--font-family)",
                                    label: TotalServiceCount,
                                    formatter: () => "Total",
                                },
                            },
                        },
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                colors: ["#27AF4D", "#FFBC58", "#5465FF"],
                fill: {
                    type: "solid",
                },
                legend: {
                    show: true,
                    position: "bottom",
                    horizontalAlign: "center",
                    fontSize: "18px",
                    fontFamily: "var(--font-family)",
                    fontWeight: 500,
                    labels: {
                        colors: "#071B36",
                    },
                    markers: {
                        width: 15,
                        height: 15,
                    },
                },
                stroke: {
                    width: 5,
                },
                responsive: [{
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 280,
                        },
                        legend: {
                            fontSize: "15px",
                            markers: {
                                width: 12,
                                height: 12,
                            }
                        },
                    },
                }, ],
            };
            var servicePieChart = new ApexCharts(document.querySelector("#service-pie-chart"), servicePieChart);
            servicePieChart.render();


            var revenueData = <?php echo json_encode($data['revenues']); ?>

            var revenueChart = {
                series: [{
                    name: "Revenue",
                    data: revenueData,
                }, ],
                chart: {
                    type: "bar",
                    height: 340,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "25%",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ["transparent"],
                },
                colors: ["var(--primary-color)", "#C9CED4", "#FFBC58"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ],
                    tickPlacement: "between",
                    labels: {
                        style: {
                            colors: "#888888",
                            fontSize: "14px",
                            fontFamily: "var(--font-family)",
                            fontWeight: 500,
                        },
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    min: 10,
                    max: 80,
                    labels: {
                        style: {
                            colors: "#00162e",
                            fontSize: "14px",
                            fontFamily: "var(--font-family)",
                            fontWeight: 400,
                        },
                    },
                },
                fill: {
                    opacity: 1,
                },
                legend: {
                    show: false,
                },
                grid: {
                    show: true,
                    position: "back",
                    borderColor: "#edeff1",
                },
                responsive: [{
                        breakpoint: 446,
                        options: {
                            xaxis: {
                                type: "category",
                                tickAmount: 5,
                                tickPlacement: "between",
                            },
                        },
                    },
                    {
                        breakpoint: 808,
                        options: {
                            chart: {
                                height: 360,
                            },
                        },
                    },
                ],
            };
            var revenueChart = new ApexCharts(document.querySelector("#revenue-chart"), revenueChart);
            revenueChart.render();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\klpro_new\resources\views/backend/dashboard/index.blade.php ENDPATH**/ ?>