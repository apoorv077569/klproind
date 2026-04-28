<?php use \App\Helpers\Helpers; ?>
<?php use \App\Models\Setting; ?>
<?php use \App\Enums\BookingEnumSlug; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php use \App\Enums\UserTypeEnum; ?>
<?php use \App\Enums\ServiceTypeEnum; ?>

<?php
    $settings = Setting::first()->values;
    $locale = Session::get('locale', app()->getLocale());
?>
<!-- Page Sidebar Start-->

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Request::is('backend/booking/create')): ?>
<div class="page-sidebar open">
<?php else: ?>
<div class="page-sidebar">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <span class="cursor-pointer sidebar-button" id="sidebar-toggle-btn">
        <i data-feather="chevron-right" id="sidebar-toggle"></i>
    </span>
    <div class="main-header-left">
        <div class="logo-wrapper">
            <a href="<?php echo e(route('backend.dashboard')); ?>" class="logo-img">
                <img class="blur-up lazyloaded img-fluid" style="height:50px;width:187px;" alt="site-logo" src="<?php echo e(asset($settings['general']['light_logo']) ?? asset('admin/images/Logo-Light.png')); ?>">
            </a>
            <a href="<?php echo e(route('backend.dashboard')); ?>" class="favicon-img">
                <img class="blur-up lazyloaded img-fluid" style="height:50px;width:187px;" alt="site-logo" src="<?php echo e(asset($settings['general']['favicon']) ?? asset('admin/images/faviconIcon.png')); ?>">
            </a>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sidebar-menu custom-scrollbar" id="sidebar-menu">
            <li class="pin-title sidebar-main-title">
                <div>
                    <h6>Pinned</h6>
                </div>
            </li>
            <li class="sidebar-main-title">
                <div>
                    <h6><?php echo e(__('static.dashboard.dashboard')); ?></h6>
                </div>
            </li>
            <li>
                <i class="ri-pushpin-2-line"></i>
                <a href="<?php echo e(route('backend.dashboard')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Dashboard" class="sidebar-header
                <?php echo e(Request::is('backend/dashboard*') ? 'active' : ''); ?>">
                    <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/home-line.svg')); ?>">
                    <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/home-fill.svg')); ?>">
                    <span><?php echo e(__('static.dashboard.dashboard')); ?></span>
                </a>
            </li>
            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.chat.index')): ?>
                <li>
                    <i class="ri-pushpin-2-line"></i>
                    <a href="<?php echo e(route('backend.chat')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="chat" class="sidebar-header <?php echo e(Request::is('backend/chat*') ? 'active' : ''); ?>">
                        <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chat-line.svg')); ?>">
                        <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chat.svg')); ?>">
                        <span><?php echo e(__('static.chat')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->hasRole('admin') || auth()->user()->can('backend.help_tickets.index')): ?>
            <li>
                <i class="ri-pushpin-2-line"></i>
                <a href="<?php echo e(route('backend.help-tickets.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Help & Support" class="sidebar-header <?php echo e(Request::is('backend/help-tickets*') ? 'active' : ''); ?>">
                    <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chat-line.svg')); ?>">
                    <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chat.svg')); ?>">
                    <span>Help & Support</span>
                </a>
            </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.user.index', 'backend.serviceman_withdraw_request.index', 'backend.role.index',
                'backend.serviceman.index', 'backend.serviceman_wallet.index', 'backend.provider.index',
                'backend.provider_document.index', 'backend.provider_time_slot.index', 'backend.provider_wallet.index',
                'backend.withdraw_request.index', 'backend.referral.index'])): ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.user.index', 'backend.role.index', 'backend.zone_manager.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.user_management')); ?></h6>
                    </div>
                </li>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/user*') || Request::is('backend/role*') || Request::is('backend/zone_manager*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/users-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/users-fill.svg')); ?>">
                            <span><?php echo e(__('static.users.system_users')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/user*') || Request::is('backend/role*') || Request::is('backend/zone_manager*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.user.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.user.index')); ?>" class="<?php echo e(Request::is('backend/user') && !Request::is('backend/user/create') ? 'active' : ''); ?>"><?php echo e(__('static.users.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.users.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.user.create')); ?>"
                                        class="<?php echo e(Request::is('backend/user/create') ? 'active' : ''); ?>"><?php echo e(__('static.users.create')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.role.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.role.index')); ?>" class="<?php echo e(Request::is('backend/role*') || Request::is('backend/role/create') ? 'active' : ''); ?>"><?php echo e(__('static.role')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.zone_manager.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.zone_manager.index')); ?>" class="<?php echo e(Request::is('backend/zone_manager*') ? 'active' : ''); ?>"><?php echo e(__('static.zone_manager.zone_managers')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.customer.index', 'backend.wallet.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/customer*') || Request::is('backend/wallet*') && !Request::is('backend/walletBonus/create*') && !Request::is('backend/walletBonus*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/user-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/user-fill.svg')); ?>">
                            <span><?php echo e(__('static.customer.customers')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/customer*') || Request::is('backend/wallet*') && !Request::is('backend/walletBonus/create*') && !Request::is('backend/walletBonus*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.customer.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.customer.index')); ?>" class="<?php echo e(Request::is('backend/customer') && !Request::is('backend/customer/create') ? 'active' : ''); ?>"><?php echo e(__('static.customer.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.customer.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.customer.create')); ?>" class="<?php echo e(Request::is('backend/customer/create') ? 'active' : ''); ?>"><?php echo e(__('static.customer.create')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.wallet.index')); ?>" class="<?php echo e(Request::is('backend/wallet*') && !Request::is('backend/walletBonus/create*') && !Request::is('backend/walletBonus*') ? 'active' : ''); ?>"><?php echo e(__('static.wallet.wallet')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.unverified_user.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.unverfied-users.index', ['role' => RoleEnum::CONSUMER])); ?>" class="<?php echo e(Request::is('backend/unverfied-users*') ? 'active' : ''); ?>"><?php echo e(__('static.unverfied_users.unverfied_consumer')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.commission_history.index', 'backend.provider.index', 'backend.provider_document.index', 'backend.provider_time_slot.index', 'backend.provider_wallet.index', 'backend.withdraw_request.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e((!Request::is('backend/providerSiteService*') && Request::is('backend/provider*') && !Request::is('backend/provider-report')) || Request::is('backend/commission*') || Request::is('backend/withdraw-request*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/provider-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/provider-fill.svg')); ?>">
                            <span><?php echo e(__('static.provider.providers')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e((!Request::is('backend/providerSiteService*') && Request::is('backend/provider*') && !Request::is('backend/provider-report')) || Request::is('backend/withdraw-request*') || Request::is('backend/commission*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.provider.index')); ?>"
                                        class="<?php echo e(!Request::is('backend/providerSiteService*') && Request::is('backend/provider') && !Request::is('backend/provider/create') && !Request::is('backend/provider-document*') ? 'active' : ''); ?>"><?php echo e(__('static.provider.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.provider.create')); ?>"
                                        class="<?php echo e(Request::is('backend/provider/create') ? 'active' : ''); ?>"><?php echo e(__('static.provider.create')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_wallet.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.provider-wallet.index')); ?>"
                                        class="<?php echo e(Request::is('backend/provider-wallet*') ? 'active' : ''); ?>"><?php echo e(__('static.wallet.wallet')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_document.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.provider-document.index')); ?>"
                                        class="<?php echo e(Request::is('backend/provider-document*') ? 'active' : ''); ?>"><?php echo e(__('static.provider_document.provider_documents')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_time_slot.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.provider-time-slot.index')); ?>"
                                        class="<?php echo e(Request::is('backend/provider-time-slot*') ? 'active' : ''); ?>"><?php echo e(__('static.provider_time_slot.provider_time_slot')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.commission_history.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.commission.index')); ?>"
                                        class="<?php echo e(Request::is('backend/commission*') ? 'active' : ''); ?>"><?php echo e(__('static.commission_history.commission_history')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.withdraw_request.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.withdraw-request.index')); ?>"
                                        class="<?php echo e(Request::is('backend/withdraw-request*') ? 'active' : ''); ?>"><?php echo e(__('static.withdraw.withdraw_request')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.unverified_user.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.unverfied-users.index', ['role' => RoleEnum::PROVIDER])); ?>"
                                        class="<?php echo e(Request::is('backend/unverified-users*') ? 'active' : ''); ?>"><?php echo e(__('static.unverfied_users.unverfied_provider')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?> -->

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->hasRole(RoleEnum::ADMIN) || (auth()->user()->hasRole(RoleEnum::PROVIDER) && auth()->user()->type === 'company')): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.serviceman.index', 'backend.serviceman.create', 'backend.serviceman_withdraw_request.index', 'backend.serviceman_wallet.index'])): ?>
                        <li>
                            <i class="ri-pushpin-2-line"></i>
                            <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/serviceman*') ? 'active' : ''); ?>">
                                <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/serviceman-line.svg')); ?>">
                                <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/serviceman-fill.svg')); ?>">
                                <span><?php echo e(__('static.serviceman.servicemen')); ?></span>
                                <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                            </a>
                            <ul class="sidebar-submenu <?php echo e(Request::is('backend/serviceman*') ? 'menu-open' : ''); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman.index')); ?>" class=" <?php echo e(Request::is('backend/serviceman') ? 'active' : ''); ?>"><?php echo e(__('static.serviceman.all')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman.create')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman.create')); ?>" class=" <?php echo e(Request::is('backend/serviceman/create') ? 'active' : ''); ?>"><?php echo e(__('static.serviceman.create')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman_document.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman-document.index')); ?>" class="<?php echo e(Request::is('backend/serviceman-document*') ? 'active' : ''); ?>"><?php echo e(__('static.serviceman-document.serviceman-documents')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman_wallet.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman-wallet.index')); ?>" class="<?php echo e(Request::is('backend/serviceman-wallet*') ? 'active' : ''); ?>"><?php echo e(__('static.wallet.wallet')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman_withdraw_request.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman-withdraw-request.index')); ?>"
                                            class="<?php echo e(Request::is('backend/serviceman-withdraw-request*') ? 'active' : ''); ?>"><?php echo e(__('static.withdraw.withdraw_request')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman_location.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman-location.index')); ?>"
                                            class="<?php echo e(Request::is('backend/serviceman-location*') ? 'active' : ''); ?>"><?php echo e(__('static.serviceman.locations')); ?></a>
                                    </li>
                                <?php endif; ?>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.serviceman.edit')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.serviceman-time-slot.index')); ?>"
                                            class="<?php echo e(Request::is('backend/serviceman-time-slot*') ? 'active' : ''); ?>">Time Slots</a>
                                    </li>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.unverified_user.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.unverfied-users.index', ['role' => RoleEnum::SERVICEMAN])); ?>" class="<?php echo e(Request::is('backend/unverfied-users*') ? 'active' : ''); ?>"><?php echo e(__('static.unverfied_users.unverfied_serviceman')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.unverified_user.index')): ?>
                <li>
                    <i class="ri-pushpin-2-line"></i>
                    <a href="<?php echo e(route('backend.unverfied-users.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Unverified Users" class="sidebar-header <?php echo e(Request::is('backend/unverified-users*') ? 'active' : ''); ?>">
                        <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/unverified-users-line.svg')); ?>">
                        <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/unverified-users-fill.svg')); ?>">
                        <span><?php echo e(__('static.unverfied_users.unverfied_users')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.referral.index')): ?>
                <li>
                    <i class="ri-pushpin-2-line"></i>
                    <a href="<?php echo e(route('backend.referral.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Referrals" 
                        class="sidebar-header <?php echo e(Request::is('backend/referral') ? 'active' : ''); ?>">
                        <img class="inactive-icon"
                            src="<?php echo e(asset('admin/images/svg/sidebar-icon/referrals-line.svg')); ?>">
                        <img class="active-icon"
                            src="<?php echo e(asset('admin/images/svg/sidebar-icon/referrals-fill.svg')); ?>">
                        <span><?php echo e(__('static.dashboard.referral')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.zone.index', 'backend.service-package.index', 'backend.service.index', 'backend.service_category.index', 'backend.service_request.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.service_management')); ?></h6>
                    </div>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.zone.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);"
                            class="sidebar-header <?php echo e(Request::is('backend/zone*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/blogs-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/blogs-fill.svg')); ?>">
                            <span><?php echo e(__('static.zone.zones')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>

                        <ul
                            class="sidebar-submenu <?php echo e(Request::is('backend/zone*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.booking.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.zone.index')); ?>"
                                        class="<?php echo e(Request::is('backend/zone') && !Request::is('backend/zone/create') ? 'active' : ''); ?>"><?php echo e(__('static.zone.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.zone.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.zone.create')); ?>"
                                        class="<?php echo e(Request::is('backend/zone/create') ? 'active' : ''); ?>"><?php echo e(__('static.zone.create')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.service-package.index', 'backend.service.index', 'backend.service_category.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e((Request::is('backend/service*') && !Request::is('backend/serviceman*') && !Request::is('backend/servicemen-review*') && !Request::is('backend/service-requests*')) || Request::is('backend/service-package*') || Request::is('backend/category*') || Request::is('backend/providerSiteService*') || Request::is('backend/additional-service*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-fill.svg')); ?>">
                            <span><?php echo e(__('static.service.services')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e((Request::is('backend/service*') && !Request::is('backend/serviceman*') && !Request::is('backend/servicemen-review*') && !Request::is('backend/service-requests*')) || Request::is('backend/category*') || Request::is('backend/providerSiteService*') || Request::is('backend/additional-service*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service.index')): ?>
                                <li>
                                    <a href="<?php echo e(Helpers::withZone('backend.service.index')); ?>" class="zone-based-link <?php echo e(Request::is('backend/service*') && !Request::is('backend/service/create') && !Request::is('backend/serviceman*') && !Request::is('backend/service-package*') && !Request::is('backend/servicemen-review*') && !Request::is('backend/service-requests*') ? 'active' : ''); ?>"><?php echo e(__('static.service.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.service.create')); ?>"
                                        class="<?php echo e(Request::is('backend/service/create') ? 'active' : ''); ?>"><?php echo e(__('static.service.create')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_category.index')): ?>
                                <li>
                                    <a href="<?php echo e(Helpers::withZone('backend.category.index')); ?>"
                                        class="zone-based-link <?php echo e(Request::is('backend/category*') ? 'active' : ''); ?>"><?php echo e(__('static.categories.categories')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($settings['activation']['additional_services']) && $settings['activation']['additional_services']): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.additional-service.index')); ?>"
                                            class="<?php echo e(Request::is('backend/additional-service*') ? 'active' : ''); ?>"><?php echo e(__('static.additional_service.additional_services')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service-package.index')): ?>
                                <li>
                                    <a href="<?php echo e(Helpers::withZone('backend.service-package.index')); ?>"
                                        class="zone-based-link <?php echo e(Request::is('backend/service-package*') ? 'active' : ''); ?>"><?php echo e(__('static.service_package.service_packages')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.service_request.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(Helpers::withZone('backend.service-requests.index')); ?>"  data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Custom Jobs" class="zone-based-link sidebar-header <?php echo e(Request::is('backend/service-requests*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/global-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/global-fill.svg')); ?>">
                            <span><?php echo e(__('static.service_request.service_requests')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.testimonial.index', 'backend.booking.index', 'backend.payment_method.index', 'backend.review.index', 'backend.report.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.booking_management')); ?></h6>
                    </div>
                </li>
                <li>
                    <i class="ri-pushpin-2-line"></i>
                    <a href="javascript:void(0);"
                        class="sidebar-header <?php echo e(Request::is('backend/booking*') && !Request::is('backend/booking-report') ? 'active' : ''); ?>">
                        <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/calendar-line.svg')); ?>">
                        <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/calendar-fill.svg')); ?>">
                        <span><?php echo e(__('static.booking.bookings')); ?></span>
                        <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                    </a>

                    <ul
                        class="sidebar-submenu <?php echo e(Request::is('backend/booking*') && !Request::is('backend/booking-report') ? 'menu-open' : ''); ?>">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.booking.index')): ?>
                            <?php
                                $bookingCounts = Helpers::getBookingCountsForSidebar();
                            ?>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index')); ?>"
                                    class="zone-based-link <?php echo e(Request::fullUrlIs(route('backend.booking.index')) ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.all')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::PENDING])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::PENDING ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.pending')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::PENDING] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::PENDING]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::ACCEPTED])); ?>" class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::ACCEPTED ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.accepted')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::ACCEPTED] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::ACCEPTED]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::ASSIGNED])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::ASSIGNED ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.assigned')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::ASSIGNED] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::ASSIGNED]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::ON_THE_WAY])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::ON_THE_WAY ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.on_the_way')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::ON_THE_WAY] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::ON_THE_WAY]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::ON_GOING])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::ON_GOING ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.on_going')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::ON_GOING] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::ON_GOING]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::CANCEL])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::CANCEL ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.cancel')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::CANCEL] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::CANCEL]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => BookingEnumSlug::COMPLETED])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === BookingEnumSlug::COMPLETED ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.completed')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts[BookingEnumSlug::COMPLETED] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts[BookingEnumSlug::COMPLETED]); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                            <li>
                                <a href="<?php echo e(Helpers::withZone('backend.booking.index', ['status' => ServiceTypeEnum::SCHEDULED])); ?>"
                                    class="zone-based-link <?php echo e(request('status') === ServiceTypeEnum::SCHEDULED ? 'active' : ''); ?>">
                                    <?php echo e(__('static.booking.schedule')); ?>

                                </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($bookingCounts['scheduled'] ?? 0) > 0): ?>
                                    <span class="badge"><?php echo e($bookingCounts['scheduled']); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.booking.index')): ?>
                        <li>
                            <a href="<?php echo e(route('backend.cart.index')); ?>"
                                class="<?php echo e(Request::is('backend/cart*') ? 'active' : ''); ?>">
                                Abandoned Carts
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.payment_method.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/transaction*') && !Request::is('backend/transaction-report') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/transactions-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/transactions-fill.svg')); ?>">
                            <span><?php echo e(__('static.transaction.transactions')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/transaction*') || Request::is('backend/cash-booking*') && !Request::is('backend/transaction-report') ? 'menu-open' : ''); ?>">
                            <li>
                                <a href="<?php echo e(route('backend.transaction.index')); ?>" class="<?php echo e(Request::is('backend/transaction*') && !Request::is('backend/transaction-report') && !Request::get('payment_methods') ? 'active' : ''); ?>"><?php echo e(__('static.transaction.online_payments')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('backend.transaction.cash-bookings')); ?>" class="<?php echo e(Request::is('backend/cash-booking*') && !Request::is('backend/transaction-report') ? 'active' : ''); ?>"><?php echo e(__('static.transaction.cash_bookings')); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.review.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);"
                            class="sidebar-header <?php echo e(Request::is('backend/review*') || Request::is('backend/servicemen-review') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/review-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/review-fill.svg')); ?>">
                            <span><?php echo e(__('static.review.all')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/review*') || Request::is('backend/servicemen-review*') ? 'menu-open' : ''); ?>">
                            <li>
                                <a href="<?php echo e(route('backend.review.index')); ?>"
                                    class="<?php echo e(Request::is('backend/review*') ? 'active' : ''); ?>"><?php echo e(__('static.review.service_reviews')); ?></a>
                            </li>
                            <!--<li>
                                <a href="<?php echo e(route('backend.servicemen-review')); ?>"
                                    class="<?php echo e(Request::is('backend/servicemen-review*') ? 'active' : ''); ?>"><?php echo e(__('static.review.serviceman_reviews')); ?></a>
                            </li>-->
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.report.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);"
                            class="sidebar-header <?php echo e(Request::is('backend/transaction-report') || Request::is('backend/booking-report') || Request::is('backend/provider-report') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chart-2-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/chart-2-fill.svg')); ?>">
                            <span><?php echo e(__('static.report.reports')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>

                        <ul
                            class="sidebar-submenu <?php echo e(Request::is('backend/transaction-report') || Request::is('backend/booking-report') || Request::is('backend/provider-report') ? 'menu-open' : ''); ?>">
                            <li>
                                <a href="<?php echo e(route('backend.transaction-report.index')); ?>"
                                    class="<?php echo e(Request::fullUrlIs(route('backend.transaction-report.index')) ? 'active' : ''); ?>">
                                    <?php echo e(__('static.report.transaction_reports')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('backend.booking-report.index')); ?>"
                                    class="<?php echo e(Request::fullUrlIs(route('backend.booking-report.index')) ? 'active' : ''); ?>">
                                    <?php echo e(__('static.report.booking_reports')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('backend.provider-report.index')); ?>"
                                    class="<?php echo e(Request::fullUrlIs(route('backend.provider-report.index')) ? 'active' : ''); ?>">
                                    <?php echo e(__('static.report.provider_reports')); ?>

                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.coupon.index', 'backend.plan.index', 'backend.banner.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6>Marketing</h6>
                    </div>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.coupon.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(Helpers::withZone('backend.coupon.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Coupons" 
                            class="sidebar-header zone-based-link <?php echo e(Request::is('backend/coupon*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/coupon-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/coupon-fill.svg')); ?>">
                            <span><?php echo e(__('static.coupon.coupons')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!-- <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::isModuleEnable('Subscription')): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.plan.index')): ?>
                        <li>
                            <i class="ri-pushpin-2-line"></i>
                            <a href="javascript:void(0);"
                                class="sidebar-header  <?php echo e(Request::is('backend/plan*') || Request::is('backend/subscriptions*') ? 'active' : ''); ?>">
                                <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/transactions-line.svg')); ?>">
                                <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/transactions-fill.svg')); ?>">
                                <span><?php echo e(__('static.plan.plans')); ?></span>
                                <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                            </a>
                            <ul class="sidebar-submenu <?php echo e(Request::is('backend/plan*') || Request::is('backend/subscriptions*') ? 'menu-open' : ''); ?>">
                                <li>
                                    <a href="<?php echo e(route('backend.plan.index')); ?>" class="<?php echo e(Request::is('backend/plan*') ? 'active' : ''); ?>"><?php echo e(__('static.plan.all')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('backend.subscription.index')); ?>" class="<?php echo e(Request::is('backend/subscriptions*') ? 'active' : ''); ?>"><?php echo e(__('static.plan.subscriptions')); ?></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.banner.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/banner*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/flag-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/flag-fill.svg')); ?>">
                            <span><?php echo e(__('static.banner.banners')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/banner*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.banner.index')): ?>
                                <li>
                                    <a href="<?php echo e(Helpers::withZone('backend.banner.index')); ?>" class="<?php echo e(Request::is('backend/banner') && !Request::is('backend/banner/create') ? 'active' : ''); ?>"><?php echo e(__('static.banner.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.banner.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.banner.create')); ?>" class="<?php echo e(Request::is('backend/banner/create') ? 'active' : ''); ?>"><?php echo e(__('static.banner.create')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.advertisement.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/advertisement*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/ads-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/ads-fill.svg')); ?>">
                            <span><?php echo e(__('static.advertisement.advertisement')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/advertisement*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.advertisement.index')): ?>
                                <li>
                                    <a href="<?php echo e(Helpers::withZone('backend.advertisement.index')); ?>" class="<?php echo e(Request::is('backend/advertisement') && !Request::is('backend/advertisement/create') ? 'active' : ''); ?>"><?php echo e(__('static.advertisement.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.advertisement.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.advertisement.create')); ?>" class="<?php echo e(Request::is('backend/advertisement/create') ? 'active' : ''); ?>"><?php echo e(__('static.advertisement.create')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?> -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.push_notification.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/notifications*') || Request::is('backend/push-notifications') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/notification-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/notification-fill.svg')); ?>">
                            <span><?php echo e(__('static.notification.notifications')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/notifications') || Request::is('backend/push-notifications') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.push_notification.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.notifications')); ?>" class="<?php echo e(Request::is('backend/notifications*') && !Request::is('backend/push-notifications') ? 'active' : ''); ?>"><?php echo e(__('static.notification.list_notifications')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.push_notification.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.push-notifications')); ?>" class="<?php echo e(Request::is('backend/push-notifications') ? 'active' : ''); ?>"><?php echo e(__('static.notification.send')); ?></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.news_letter.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.subscribers')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Subscriptions" class="sidebar-header  <?php echo e(Request::is('backend/subscribers') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-fill.svg')); ?>">
                            <span><?php echo e(__('static.subscribers.subscribers')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.testimonial.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.testimonial.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Testimonials" class="sidebar-header  <?php echo e(Request::is('backend/testimonial') || Request::is('backend/testimonial/create') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/message-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/message-fill.svg')); ?>">
                            <span><?php echo e(__('static.testimonials.testimonials')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.tax.index', 'backend.currency.index', 'backend.wallet_bonus.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.financial_management')); ?></h6>
                    </div>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet_bonus.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/walletBonus*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/document-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/document-fill.svg')); ?>">
                            <span><?php echo e(__('static.wallet.wallet_bonuses')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/walletBonus*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet_bonus.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.walletBonus.index')); ?>"
                                        class="<?php echo e(Request::is('backend/walletBonus*') && !Request::is('backend/walletBonus/create') ? 'active' : ''); ?>"><?php echo e(__('static.wallet.all_wallet_bonuses')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet_bonus.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.walletBonus.create', ['locale' => $locale])); ?>"
                                        class="<?php echo e(Request::is('backend/walletBonus/create') ? 'active' : ''); ?>"><?php echo e(__('static.wallet.create_wallet_bonus')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.tax.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(Helpers::withZone('backend.tax.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Taxes" class="sidebar-header <?php echo e(Request::is('backend/tax*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/percentage-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/percentage-fill.svg')); ?>">
                            <span><?php echo e(__('static.tax.taxes')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
               <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.currency.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.currency.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Currencies" class="sidebar-header <?php echo e(Request::is('backend/currency*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/dollar-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/dollar-fill.svg')); ?>">
                            <span><?php echo e(__('static.currency.currencies')); ?></span>
                        </a>
                    </li>
                <?php endif; ?> -->
            <?php endif; ?>

            <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.blog_category.index', 'backend.tag.index', 'backend.blog.index', 'backend.page.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.content_management')); ?></h6>
                    </div>
                </li>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($settings['activation']['blogs_enable']) && $settings['activation']['blogs_enable']): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.blog_category.index', 'backend.tag.index', 'backend.blog.index'])): ?>
                        <li>
                            <i class="ri-pushpin-2-line"></i>
                            <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/tag*') || Request::is('backend/blog*') || Request::is('backend/blog-category*') ? 'active' : ''); ?>">
                                <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/coupon-line.svg')); ?>">
                                <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/coupon-fill.svg')); ?>">
                                <span><?php echo e(__('static.blog.blogs')); ?></span>
                                <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                            </a>
                            <ul class="sidebar-submenu <?php echo e(Request::is('backend/blog*') || Request::is('backend/tag*') ? 'menu-open' : ''); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.blog.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.blog.index')); ?>" class="<?php echo e(Request::is('backend/blog') ? 'active' : ''); ?>"><?php echo e(__('static.blog.all')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.blog.create')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.blog.create')); ?>" class="<?php echo e(Request::is('backend/blog/create') ? 'active' : ''); ?>"><?php echo e(__('static.blog.create')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.blog_category.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.blog-category.index')); ?>" class="<?php echo e(Request::is('backend/blog-category*') ? 'active' : ''); ?>"><?php echo e(__('static.categories.categories')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.tag.index')): ?>
                                    <li>
                                        <a href="<?php echo e(route('backend.tag.index')); ?>" class="<?php echo e(Request::is('backend/tag*') ? 'active' : ''); ?>"><?php echo e(__('static.tag.tags')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.page.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.page.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Pages" class="sidebar-header <?php echo e(Request::is('backend/page*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/pages-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/pages-fill.svg')); ?>">
                            <span><?php echo e(__('static.page.pages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>-->

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.document.index', 'backend.language.index', 'backend.payment_method.index', 'backend.setting.index'])): ?>
                <li class="sidebar-main-title">
                    <div>
                        <h6><?php echo e(__('static.dashboard.settings_management')); ?></h6>
                    </div>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.document.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/document*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/document-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/document-fill.svg')); ?>">
                            <span><?php echo e(__('static.document.document')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/document*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.document.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.document.index')); ?>" class="<?php echo e(Request::is('backend/document*') && !Request::is('backend/document/create') ? 'active' : ''); ?>"><?php echo e(__('static.document.all')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.document.create')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.document.create')); ?>" class="<?php echo e(Request::is('backend/document/create') ? 'active' : ''); ?>"><?php echo e(__('static.document.create')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.theme_option.index', 'backend.home_page.index', 'backend.customization.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/home-page*') || Request::is('backend/theme-option*') || Request::is('backend/customization*') || Request::is('backend/robot*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/file-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/file-fill.svg')); ?>">
                            <span><?php echo e(__('static.appearances.appearances')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/home-page*') || Request::is('backend/theme-options*') || Request::is('backend/customization*') || Request::is('backend/robot*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.theme_option.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.theme_options.index')); ?>"
                                        class="<?php echo e(Request::is('backend/theme-options*') ? 'active' : ''); ?>"><?php echo e(__('static.theme_options.theme_options')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.home_page.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.home_page.index', ['locale' => $locale])); ?>"
                                        class="<?php echo e(Request::is('backend/home-page*') ? 'active' : ''); ?>"><?php echo e(__('static.appearances.home_page')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.customization.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.customization.index')); ?>"
                                        class="<?php echo e(Request::is('backend/customization*') ? 'active' : ''); ?>"><?php echo e(__('static.appearances.customizations')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.theme_option.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.robot.index')); ?>"
                                        class="<?php echo e(Request::is('backend/robot*') ? 'active' : ''); ?>"><?php echo e(__('static.appearances.robots')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>-->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.language.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.systemLang.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Languages" class="sidebar-header <?php echo e(Request::is('backend/systemLang*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/language-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/language-fill.svg')); ?>">
                            <span><?php echo e(__('static.language.languages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.email_template.index', 'backend.sms_template.index', 'backend.push_notification_template.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/email-template*') || Request::is('backend/sms-template*') || Request::is('backend/push-notification-template*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/edit-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/edit-fill.svg')); ?>">
                            <span><?php echo e(__('static.notify_templates.notify_templates')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/email-template*') || Request::is('backend/sms-template*') || Request::is('backend/push-notification-template*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.email_template.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.email-template.index')); ?>"
                                        class="<?php echo e(Request::is('backend/email-template*') ? 'active' : ''); ?>"><?php echo e(__('static.email_templates.email')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.sms_template.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.sms-template.index')); ?>"
                                        class="<?php echo e(Request::is('backend/sms-template*') ? 'active' : ''); ?>"><?php echo e(__('static.sms_templates.sms')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.push_notification_template.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.push-notification-template.index')); ?>"
                                        class="<?php echo e(Request::is('backend/push-notification-template*') ? 'active' : ''); ?>"><?php echo e(__('static.push_notification_templates.push_notification')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.payment_method.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.paymentmethods.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Payment Methods" class="sidebar-header <?php echo e(Request::is('backend/payment-methods*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/payment-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/payment-fill.svg')); ?>">
                            <span><?php echo e(__('static.payment_methods.payment_methods')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.sms_gateway.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.smsgateways.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="SMS Gateways" class="sidebar-header <?php echo e(Request::is('backend/sms-gateways*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/sms-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/sms-fill.svg')); ?>">
                            <span><?php echo e(__('static.sms_gateways.sms_gateways')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.custom_sms_gateway.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.custom-sms-gateway.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Custom SMS Gateways" class="sidebar-header <?php echo e(Request::is('backend/custom-sms-gateway*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/sms-gateways-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/sms-gateways-fill.svg')); ?>">
                            <span><?php echo e(__('static.custom_sms_gateways.custom_sms_gateways')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
               
               <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.custom_ai_model.index')): ?> 
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.custom-ai-model.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Custom AI Models" class="sidebar-header <?php echo e(Request::is('backend/custom-ai-model*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/setting-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/setting-fill.svg')); ?>">
                            <span><?php echo e(__('static.custom_ai_models.custom_ai_models')); ?></span>
                        </a>
                    </li>
                 <?php endif; ?> -->

               <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.backup.index', 'backend.system_tool.index', 'backend.seo_setting.index'])): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="javascript:void(0);" class="sidebar-header <?php echo e(Request::is('backend/backup') || Request::is('backend/activity-logs') || Request::is('backend/cleanup-db') || Request::is('backend.import*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/file-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/file-fill.svg')); ?>">
                            <span><?php echo e(__('static.system_tools.system_tools')); ?></span>
                            <img class="stroke-icon" src="<?php echo e(asset('admin/images/svg/arrow-right-2.svg')); ?>">
                        </a>
                        <ul class="sidebar-submenu <?php echo e(Request::is('backend/backup*') || Request::is('backend/activity-logs*') || Request::is('backend/cleanup-db*') || Request::is('backend/import*') || Request::is('backend/seo-setting*') ? 'menu-open' : ''); ?>">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.seo_setting.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.seo-setting.index')); ?>" class="<?php echo e(Request::is('backend/seo-setting*') ? 'active' : ''); ?>"><?php echo e(__('static.seo_setting.seo_settings')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.backup.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.backup.index')); ?>" class="<?php echo e(Request::is('backend/backup*') ? 'active' : ''); ?>"><?php echo e(__('static.system_tools.backup')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.system_tool.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.activity-logs.index')); ?>" class="<?php echo e(Request::is('backend/activity-logs*') ? 'active' : ''); ?>"><?php echo e(__('static.system_tools.activity_logs')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.system_tool.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.cleanup-db.index')); ?>" class="<?php echo e(Request::is('backend/cleanup-db*') ? 'active' : ''); ?>"><?php echo e(__('static.system_tools.database_cleanup')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.system_tool.index')): ?>
                                <li>
                                    <a href="<?php echo e(route('backend.import.index')); ?>" class="<?php echo e(Request::is('backend/import*') ? 'active' : ''); ?>"><?php echo e(__('static.system_tools.import_export')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?> -->
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.setting.index')): ?>
                    <li>
                        <i class="ri-pushpin-2-line"></i>
                        <a href="<?php echo e(route('backend.settings.index')); ?>" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-title="Settings" class="sidebar-header <?php echo e(Request::is('backend/settings*') ? 'active' : ''); ?>">
                            <img class="inactive-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-line.svg')); ?>">
                            <img class="active-icon" src="<?php echo e(asset('admin/images/svg/sidebar-icon/service-fill.svg')); ?>">
                            <span><?php echo e(__('static.settings.settings')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            
        </ul>

        <div class="fix-bottom-box">
            <ul class="fix-bottom-list">
                <li class="w-100">
                    <div class="theme-option-box">
                        <div class="dark-light-mode" id="dark-system">
                            <i data-feather="sun" class="dark-mode"></i>
                            <i data-feather="moon" class="light-mode"></i>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <button class="log-out-btn btn">
                                <a href="<?php echo e(route('frontend.logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout">
                                    <i data-feather="log-out"></i>
                                </a>
                                <form action="<?php echo e(route('frontend.logout')); ?>" method="POST" class="d-none" id="logout-form">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->startPush('js'); ?>
<!-- Page Sidebar End -->
<script>
  $(document).ready(function() {
    "use strict";
    if ($(".sidebar .sidebar-menu") && $(".page-wrapper")) {
        $(".sidebar .sidebar-menu").animate({
                scrollTop: $(".sidebar .sidebar-menu a.active").offset().top - 400,
            },
            0
        );
    }
  })
</script>
<script>
    (function() {
        var sidebarMenu = document.querySelector(".page-sidebar .sidebar-menu");
        var pinTitle = document.querySelector(".pin-title");
        let pinIcons = document.querySelectorAll(".sidebar-menu > li .ri-pushpin-2-line");

        let originalScrollTop = sidebarMenu.scrollTop; // Store original scroll position

        function togglePinnedName() {
            if (document.querySelectorAll(".pined").length > 0) {
                pinTitle.classList.add("show");
            } else {
                pinTitle.classList.remove("show");
            }
        }

        pinIcons.forEach((item) => {
            var linkName = item.parentNode.querySelector("span").innerText;
            var InitialLocalStorage = JSON.parse(localStorage.getItem("pins") || "[]");

            // Restore pinned state from localStorage
            if (InitialLocalStorage.includes(linkName)) {
                item.parentNode.classList.add("pined");
            }

            item.addEventListener("click", (event) => {
                var localStoragePins = JSON.parse(localStorage.getItem("pins") || "[]");
                let listItem = item.parentNode; // The <li> being pinned/unpinned

                listItem.classList.toggle("pined");

                if (listItem.classList.contains("pined")) {
                    if (!localStoragePins.includes(linkName)) {
                        localStoragePins.push(linkName);
                    }

                    // Ensure original position is stored BEFORE scrolling
                    originalScrollTop = sidebarMenu.scrollTop;

                    // Move pinned item to the top
                    let scrollToPosition = listItem.getBoundingClientRect().top + sidebarMenu
                        .scrollTop - 50;
                    smoothScrollTo(sidebarMenu, scrollToPosition, 400);
                } else {
                    localStoragePins = localStoragePins.filter((pin) => pin !== linkName);
                    smoothScrollTo(sidebarMenu, originalScrollTop, 400); // Scroll back to original position
                }

                localStorage.setItem("pins", JSON.stringify(localStoragePins));
                togglePinnedName();
            });
        });

        function smoothScrollTo(element, target, duration) {
            var start = element.scrollTop;
            var change = target - start;
            var currentTime = 0;
            var increment = 20;

            function animateScroll() {
                currentTime += increment;
                var val = easeInOutQuad(currentTime, start, change, duration);
                element.scrollTop = val;
                if (currentTime < duration) {
                    setTimeout(animateScroll, increment);
                }
            }
            animateScroll();
        }

        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return (c / 2) * t * t + b;
            t--;
            return (-c / 2) * (t * (t - 2) - 1) + b;
        }

        togglePinnedName();
    })();

</script>

<script>
    function initSidebarHover() {
    const sidebar = document.querySelector('.page-sidebar');
    const sidebarMenuLists = document.querySelectorAll('.page-sidebar li');

        sidebarMenuLists.forEach(li => {
            li.addEventListener('mouseenter', function () {
                if (sidebar.classList.contains('open') && window.innerWidth > 991) {
                    const submenu = this.querySelector('.sidebar-submenu');
                    if (submenu) {
                        const rect = this.getBoundingClientRect();

                        submenu.classList.add('open', 'custom-scrollbar');
                        submenu.style.position = 'fixed';
                        submenu.style.top = (rect.top + 10) + 'px';
                        submenu.style.width = '250px';
                        submenu.style.zIndex = '11';

                        if (document.dir === 'rtl') {
                            submenu.style.left = 'auto';
                            submenu.style.right = (window.innerWidth - rect.left) + 'px';
                        } else {
                            submenu.style.left = rect.right + 'px';
                        }
                    }
                }
            });


            li.addEventListener('mouseleave', function () {
                const submenu = this.querySelector('.sidebar-submenu');
                if (submenu) {
                    submenu.classList.remove('open');
                    submenu.removeAttribute('style');
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initSidebarHover);
    document.addEventListener('livewire:navigated', initSidebarHover);

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/layouts/partials/sidebar.blade.php ENDPATH**/ ?>