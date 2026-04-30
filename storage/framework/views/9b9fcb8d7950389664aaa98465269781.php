<?php use \app\Helpers\Helpers; ?>
<?php use \App\Enums\RoleEnum; ?>
<?php use \App\Enums\SymbolPositionEnum; ?>
<?php use \App\Enums\AdvertisementStatusEnum; ?>

<div class="action-div">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($data)): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($serviceRequest)): ?>
        <?php
            $currencySetting = Helpers::getSettings()['general']['default_currency'];
            $currencySymbol = $currencySetting->symbol;
            $symbolPosition = $currencySetting->symbol_position ?? SymbolPositionEnum::LEFT->value;
            $formattedPrice = $serviceRequest->initial_price ? number_format($serviceRequest->initial_price, 2) : 'N/A';
            $priceDisplay = $serviceRequest->initial_price
                ? ($symbolPosition === SymbolPositionEnum::LEFT->value ? $currencySymbol . ' ' . $formattedPrice : $formattedPrice . ' ' . $currencySymbol)
                : 'N/A';
        ?>
        
        <a href="javascript:void(0)" class="booking-icon show-icon" data-bs-toggle="modal"
            data-bs-target="#customJobDetailsModal<?php echo e($serviceRequest->id); ?>" data-bs-toggle="tooltip" data-placement="bottom" title="Custom Job Details">
            <i data-feather="info"></i>
        </a>
        
        <a href="javascript:void(0)" class="booking-icon show-icon" data-bs-toggle="modal"
            data-bs-target="#bidsModal<?php echo e($serviceRequest->id); ?>" data-bs-toggle="tooltip" data-placement="bottom" title="View Bids">
            <i data-feather="eye"></i>
        </a>
        
        <div class="modal fade custom-job-details-modal" id="customJobDetailsModal<?php echo e($serviceRequest->id); ?>" tabindex="-1"
            aria-labelledby="customJobDetailsModalLabel<?php echo e($serviceRequest->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-sm">
                    <div class="modal-header border-bottom bg-light py-3 px-4">
                        <h5 class="modal-title fw-semibold d-flex align-items-center gap-2" id="customJobDetailsModalLabel<?php echo e($serviceRequest->id); ?>">
                            <i data-feather="file-text" class="flex-shrink-0" style="width: 1.25rem; height: 1.25rem;"></i>
                            Custom Job Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="custom-job-details-body">
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.title')); ?></span>
                                <span class="detail-value"><?php echo e($serviceRequest->title ?? '—'); ?></span>
                            </div>
                            <div class="detail-row detail-row-description">
                                <span class="detail-label"><?php echo e(__('static.service.description')); ?></span>
                                <div class="detail-value detail-value-block"><?php echo e($serviceRequest->description ?? '—'); ?></div>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.service.duration')); ?></span>
                                <span class="detail-value"><?php echo e($serviceRequest->duration ?? '—'); ?><?php echo e($serviceRequest->duration_unit ? ' ' . ucfirst($serviceRequest->duration_unit) : ''); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.service.required_servicemen')); ?></span>
                                <span class="detail-value"><?php echo e($serviceRequest->required_servicemen ?? '—'); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.service.price')); ?></span>
                                <span class="detail-value fw-semibold"><?php echo e($priceDisplay); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.service.provider_name')); ?></span>
                                <span class="detail-value"><?php echo e($serviceRequest->provider?->name ?? 'N/A'); ?></span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label"><?php echo e(__('static.status')); ?></span>
                                <span class="detail-value">
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1"><?php echo e(ucfirst($serviceRequest->status ?? '—')); ?></span>
                                </span>
                            </div>
                            <div class="detail-row detail-row-last">
                                <span class="detail-label"><?php echo e(__('static.created_at')); ?></span>
                                <span class="detail-value text-muted small"><?php echo e($serviceRequest->created_at ? \Carbon\Carbon::parse($serviceRequest->created_at)->format('d M Y, H:i') : '—'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bids Modal -->
        <div class="modal fade bid-modal" id="bidsModal<?php echo e($serviceRequest->id); ?>" tabindex="-1"
            aria-labelledby="bidsModalLabel<?php echo e($serviceRequest->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bidsModalLabel<?php echo e($serviceRequest->id); ?>"><?php echo e(__('static.bid.bids')); ?>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('static.service_request.amount')); ?></th>
                                    <th><?php echo e(__('static.service_request.provider_name')); ?></th>
                                    <th><?php echo e(__('static.service_request.provider_email')); ?></th>
                                    <th><?php echo e(__('static.service_request.description')); ?></th>
                                    <th><?php echo e(__('static.service_request.status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $isProvider = Helpers::getCurrentRolename() === RoleEnum::PROVIDER;
                                    $currentUserId = auth()->user()->id;
                                ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $serviceRequest->bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isProvider || $bid->provider_id == $currentUserId): ?>
                                        <tr>
                                            <td><?php echo e(Helpers::getSettings()['general']['default_currency']->symbol); ?><?php echo e($bid->amount); ?>

                                            </td>
                                            <td><?php echo e($bid->provider->name ?? 'N/A'); ?></td>
                                            <td><?php echo e($bid->provider->email ?? 'N/A'); ?></td>
                                            <td><?php echo e($bid->description ?? 'N/A'); ?></td>
                                            <td><?php echo e(ucfirst($bid->status)); ?></td>
                                        </tr>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <tr>
                                        <td colspan="5" class="text-center"><?php echo e(__('static.bid.bids_not_found')); ?></td>
                                    </tr>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($show)): ?>
        <a href="<?php echo e(route($show, $data)); ?>" class="booking-icon show-icon" data-bs-toggle="tooltip" data-placement="bottom" title="Detail">
            <i data-feather="eye"></i>
        </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($review)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($review_permission ?? $review, $data)): ?>
            <!-- Button trigger modal -->
            <a href="javascript:void(0)" class="booking-icon show-icon" data-bs-toggle="modal"
                data-bs-target="#reviewModal<?php echo e($data->id); ?>" data-bs-toggle="tooltip" data-placement="bottom" title="Update">
                <i data-feather="eye"></i>
            </a>

            <!-- Modal -->
            <div class="modal fade review-modal" id="reviewModal<?php echo e($data->id); ?>">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form action="<?php echo e(route('backend.review.update', $data->id)); ?>" id="updateReview<?php echo e($data->id); ?>"
                            method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewModalLabel<?php echo e($data->id); ?>"><?php echo e(__('static.serviceman.edit_review')); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-2 text-start mb-0"
                                        for="rating"><?php echo e(__('static.serviceman.rating')); ?></label>
                                    <div class="col-10">
                                        <input type="number" name="rating" id="rating" class="form-control" step="0.01" min="0"
                                            max="5" value="<?php echo e($data->rating ?? old('rating')); ?>"
                                            placeholder="Enter rating (e.g., 4.5)" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-2 text-start mb-0"
                                        for="description"><?php echo e(__('static.description')); ?></label></label>
                                    <div class="col-10">
                                        <textarea class="form-control custom-scrollbar" name="description" id="description" rows="3"
                                            placeholder="Type Here..."
                                            required><?php echo e($data->description ?? old('description')); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary spinner-btn"><?php echo e(__('static.serviceman.update_review')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($withdraw_request)): ?>
        <a href="javascript:void(0)" data-bs-toggle="modal" class="show-icon"
            data-bs-target="#withdrawModal<?php echo e($data->id); ?>" data-bs-toggle="tooltip" data-placement="bottom" title="Withdraw">
            <i data-feather="eye"></i>
        </a>
        <div class="modal fade withdrow-modal" id="withdrawModal<?php echo e($data->id); ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel<?php echo e($data->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('static.withdraw.title')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <form method="post" id="withdrawalRequestForm" action="<?php echo e(route($withdraw_request, $data->id)); ?>">
                        <div class="modal-body text-start">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="table-responsive modal-table">
                                <table class="table mt-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo e(__('static.wallet.amount')); ?>

                                            </td>
                                            <td>

                                                <input class="form-control" type="number" name="amount"
                                                    placeholder="<?php echo e(__('static.withdraw.enter_amount')); ?>"
                                                    value="<?php echo e($data->amount ?? old('amount')); ?>" readonly>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo e(__('static.withdraw.payment_type')); ?>

                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="payment_type"
                                                    placeholder="<?php echo e(__('static.withdraw.payment_type')); ?>"
                                                    value="<?php echo e($data->payment_type ?? old('payment_type')); ?>" readonly>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo e(__('static.withdraw.message')); ?>

                                            </td>
                                            <td>
                                                <p class="modal-message" id="message" readonly>
                                                    <?php echo e($data->message ?? old('message')); ?>

                                                </p>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo e(__('static.status')); ?>

                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="status"
                                                    placeholder="<?php echo e(__('static.status')); ?>"
                                                    value="<?php echo e($data->status ?? old('status')); ?>" readonly>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($data->admin_message)): ?>
                                            <tr>
                                                <td>
                                                    <?php echo e(__('static.withdraw.admin_message')); ?>

                                                </td>
                                                <td>
                                                    <p class="modal-message" id="admin_message" readonly>
                                                        <?php echo e($data->admin_message ?? old('message')); ?>

                                                    </p>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <input type="hidden" name="provider_id" value="<?php echo e($data->provider_id); ?>">
                                    </tbody>
                                </table>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$data->is_used || (!@$data->is_used_by_admin && Helpers::getCurrentRoleName() != RoleEnum::PROVIDER)): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(@$permission)): ?>
                                    <div class="form-group row mt-3">
                                        <label class="col-12"
                                            for="admin_message"><?php echo e(__('static.withdraw.message')); ?></label></label>
                                        <div class="col-12">
                                            <textarea class="form-control" name="admin_message" id="" rows="3"
                                                placeholder="Type Here..." <?php if($data->is_used): ?> disabled
                                                <?php endif; ?>><?php echo e($data->admin_message ?? old('admin_message')); ?></textarea>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$data->is_used || (!@$data->is_used_by_admin && Helpers::getCurrentRoleName() != RoleEnum::PROVIDER)): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data->status === 'pending'): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(@$permission)): ?>
                                    <div class="modal-footer pt-2">
                                        <button class="btn btn-secondary submit-form rejected spinner-btn delete-btn" type="submit"
                                            value="rejected" name="submit"><?php echo e(__('static.rejected')); ?></button>
                                        <button class="btn btn-primary submit-form accept spinner-btn delete-btn" type="submit"
                                            value="approved" name="submit"><?php echo e(__('static.accept')); ?></button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($wallet)): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.wallet.credit', 'backend.wallet.debit'])): ?>
    <a href="javascript:void(0)" class="wallet-icon" data-bs-toggle="modal"
        data-bs-target="#walletmodal<?php echo e($data->id); ?>" data-placement="bottom" title="Wallet">
        <i data-feather="credit-card"></i>
    </a>
    <div class="modal fade wallet-modal" id="walletmodal<?php echo e($data->id); ?>" tabindex="-1"
        aria-labelledby="walletmodalLabel<?php echo e($data->id); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="<?php echo e(route($wallet)); ?>" method="POST" id="creditOrdDebitForm">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-body text-start">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i data-feather="credit-card" class="wallet-icon"></i>
                            <div class="form-group row amount wallet">
                                <h5 for="wallet">
                                    <?php echo e(__('static.wallet.wallet_balance')); ?>

                                </h5>
                                <h3 id="wallet">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getDefaultCurrency()->symbol_position === SymbolPositionEnum::LEFT): ?>    
                                        <span><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data->wallet): ?>
                                            <?php echo e(number_format($data->wallet->balance,2)); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php else: ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data->wallet): ?>
                                            <?php echo e($data->wallet->balance); ?>

                                        <?php else: ?>
                                            0
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <span><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </h3>
                            </div>
                        </div>
                        <input type="hidden" class="consumerId" name="consumer_id" value="<?php echo e($data->id); ?>">
                        <input type="hidden" class="type" name="type">
                        <div class="form-group row amount">
                            <label class="col-md-2"
                                for="<?php echo e(__('static.wallet.amount')); ?>"><?php echo e(__('static.wallet.amount')); ?><span>
                                    *</span> </label>
                            <div class="col-md-10 error-div">
                                <div class="input-group mb-3 flex-nowrap">
                                    <span
                                        class="input-group-text"><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                                    <div class="w-100">
                                        <input class="form-control balance" type="number"
                                            placeholder="<?php echo e(__('static.wallet.add_amount')); ?>" id="balance"
                                            name="balance" value="<?php echo e(old('balance')); ?>" min="1" required>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['balance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet.credit')): ?>
                            <button type="submit" class="credit btn btn-success credit-wallet spinner-btn">
                                <?php echo e(__('static.wallet.credit')); ?>

                                <i data-feather="arrow-down-circle"></i>
                            </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet.debit')): ?>
                            <button type="submit" class="debit btn btn-danger debit-wallet spinner-btn">
                                <?php echo e(__('static.wallet.debit')); ?>

                                <i data-feather="arrow-up-circle"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($providerWallet)): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['backend.provider_wallet.credit', 'backend.provider_wallet.debit'])): ?>
    <a href="javascript:void(0)" class="wallet-icon" data-bs-toggle="modal"
        data-bs-target="#walletmodal<?php echo e($data->id); ?>" data-placement="bottom" title="Wallet">
        <i data-feather="credit-card"></i>
    </a>
    <div class="modal fade wallet-modal" id="walletmodal<?php echo e($data->id); ?>" tabindex="-1"
        aria-labelledby="walletmodalLabel<?php echo e($data->id); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="<?php echo e(route($providerWallet)); ?>" method="POST" id="providerCreditOrdDebitForm">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-body text-start">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <i data-feather="credit-card" class="wallet-icon"></i>
                            <div class="form-group row amount wallet">
                                <h5 for="wallet">
                                    Wallet Balance
                                </h5>
                                <h3 id="wallet">
                                    <span><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data->providerWallet): ?>
                                        <?php echo e($data->providerWallet->balance); ?>

                                    <?php else: ?>
                                        0
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </h3>
                            </div>
                        </div>
                        <input type="hidden" class="consumerId" name="consumer_id" value="<?php echo e($data->id); ?>">
                        <input type="hidden" class="type" name="type">
                        <div class="form-group row amount">
                            <label class="col-md-2"
                                for="<?php echo e(__('static.wallet.amount')); ?>"><?php echo e(__('static.wallet.amount')); ?><span>
                                    *</span> </label>
                            <div class="col-md-10 error-div">
                                <div class="input-group mb-3 flex-nowrap">
                                    <span
                                        class="input-group-text"><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                                    <div class="w-100">
                                        <input class="form-control balance" type="number"
                                            placeholder="<?php echo e(__('static.wallet.add_amount')); ?>" id="balance"
                                            name="balance" value="<?php echo e(old('balance')); ?>" min="1" required>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['balance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <span id="balance-error" class="text-danger mt-1"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_wallet.credit')): ?>
                            <button type="submit" class="credit btn btn-success credit-wallet">
                                <?php echo e(__('static.wallet.credit')); ?>

                                <i data-feather="arrow-down-circle"></i>
                            </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_wallet.debit')): ?>
                            <button type="submit" class="debit btn btn-danger debit-wallet">
                                <?php echo e(__('static.wallet.debit')); ?>

                                <i data-feather="arrow-up-circle"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($edit)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($edit_permission ?? $edit, $data)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($data->system_reserve) ? !$data->system_reserve : true): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($locale)): ?>
                    <a href="<?php echo e(route($edit, array_merge([$data], $locale ? ['locale' => $locale] : []))); ?>" class="edit-icon"
                        data-bs-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i data-feather="edit"></i>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route($edit, $data)); ?>" class="edit-icon" data-bs-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i data-feather="edit"></i>
                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <a href="javascript:void(0)" class="lock-icon">
                    <i data-feather="lock"></i>
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($providerDocument)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_document.index')): ?>
            <a href="<?php echo e(route($providerDocument)); ?>?id=<?php echo e($data?->id); ?>" class="edit-icon" data-bs-toggle="tooltip" data-placement="bottom" title="documents">
                <i data-feather="file"></i>
            </a>
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($translate)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($edit_permission ?? $edit, $data)): ?>
            <a href="<?php echo e(route($translate, ['locale' => $data?->locale])); ?>" class="lock-icon" data-bs-toggle="tooltip" data-placement="bottom" title="Translate">
                <i data-feather="globe"></i>
            </a>
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($select)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($select)): ?>
            <input type="checkbox" name="row" class="rowClass" value="<?php echo e($data->id); ?>" id="rowId' . <?php echo e($data->id); ?> . '">
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($delete)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($delete_permission ?? $delete, $data)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($data->system_reserve) ? !$data->system_reserve : true): ?>
                <a href="#confirmationModal<?php echo e($data->id); ?>" data-bs-toggle="modal" class="delete-svg" data-placement="bottom" title="Delete">
                    <i data-feather="trash-2" class="remove-icon delete-confirmation" ></i>
                </a>
                <!-- Delete Confirmation -->
                <div class="modal fade" id="confirmationModal<?php echo e($data->id); ?>" tabindex="-1"
                    aria-labelledby="confirmationModalLabel<?php echo e($data->id); ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-start">
                                <div class="main-img">
                                    <i data-feather="trash-2"></i>
                                </div>
                                <div class="text-center">
                                    <div class="modal-title"> <?php echo e(__('static.delete_message')); ?></div>
                                    <p><?php echo e(__('static.delete_note')); ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form action="<?php echo e(route($delete, $data->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn cancel" data-bs-dismiss="modal"
                                        type="button"><?php echo e(__('static.cancel')); ?></button>
                                    <button class="btn btn-primary delete spinner-btn" id='submitBtn'
                                        type="submit"><?php echo e(__('static.delete')); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?>
        <!-- Multiple Select Delete Confirmation -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-start">
                        <div class="main-img">
                            <i data-feather="trash-2"></i>
                        </div>
                        <div class="text-center">
                            <div class="modal-title"> <?php echo e(__('static.delete_message')); ?></div>
                            <p><?php echo e(__('static.delete_note')); ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel multi-delete-cancel" id="cancelModalBtn"
                            data-dismiss="modal"><?php echo e(__('static.cancel')); ?></button>
                        <button type="button" class="btn btn-primary delete spinner-btn"
                            id="confirm-DeleteRows"><?php echo e(__('static.delete')); ?></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="verifyConfirmationModal" tabindex="-1" aria-labelledby="verifyConfirmationModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-start">
                        <div class="main-img">
                            <i data-feather="trash-2"></i>
                        </div>
                        <div class="text-center">
                            <div class="modal-title"> <?php echo e(__('static.verify_message')); ?></div>
                            <p><?php echo e(__('static.verify_note')); ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel multi-delete-cancel" id="cancelModalBtn"
                            data-dismiss="modal"><?php echo e(__('static.cancel')); ?></button>
                        <button type="button" class="btn btn-primary delete spinner-btn"
                            id="confirm-VerifyRows"><?php echo e(__('static.provider-document.verify')); ?></button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($status)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($status_permission)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Helpers::getCurrentRoleName() === RoleEnum::ADMIN): ?>
            <div class="dropdown more-option-dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" title="Update Status" aria-expanded="false">
                    <i class="ri-more-2-line"></i>
                </button>

                <ul class="dropdown-menu">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                        AdvertisementStatusEnum::PENDING => 'clock',
                        AdvertisementStatusEnum::APPROVED => 'check-circle',
                        AdvertisementStatusEnum::REJECTED => 'x-circle',
                        AdvertisementStatusEnum::RUNNING => 'play-circle',
                        AdvertisementStatusEnum::PAUSED => 'pause-circle',
                        AdvertisementStatusEnum::EXPIRED => 'archive'
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusValue => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <li>
                            <form action="<?php echo e(route($status, $data->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="status" value="<?php echo e($statusValue); ?>">
                                <button type="submit" class="dropdown-item">
                                    <i data-feather="<?php echo e($icon); ?>"></i> <?php echo e(__('static.advertisement.' . $statusValue)); ?>

                                </button>
                            </form>
                        </li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($collaps)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($collaps['data'])): ?>
            <div class="d-inline-flex">
                <a href="<?php echo e($collaps['primary_on_click_url']); ?>" class="form-controll"
              endiss="badge badge-success"><span><?php echo e(\App\Helpers\Helpers::getSettings()['general']['default_currency']->symbol); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($collaps['data']->wallet): ?>
                        <?php echo e($collaps['data']->wallet->balance); ?>

                    <?php else: ?>
                        0
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($collaps['booking_data'])): ?>
            <div class="d-inline-flex">
                <a href="<?php echo e($collaps['primary_on_click_url']); ?>" class="form-controll">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($collaps['booking_data']->booking_number): ?>
                        #<?php echo e($collaps['booking_data']->booking_number); ?>

                    <?php else: ?>
                        #N/A
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($toggle)): ?>
        <label class="switch">
            <input data-bs-toggle="modal" data-route="<?php echo e(route($route, $toggle->id)); ?>" data-id="<?php echo e($toggle->id); ?>"
                class="form-check-input toggle-status" type="checkbox" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" <?php echo e($value ? 'checked' : ''); ?> <?php if($toggle->system_reserve): ?> disabled <?php endif; ?>>
            <span class="switch-state"></span>
        </label>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($info)): ?>
        <?php
            $media = $info->getFirstMedia('image');
            $imageUrl = $media ? $media->getUrl() : null;
        ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($info->name) && !empty($info->email)): ?>
            <div class="user-info">
                <a href="<?php echo e(isset($route) ? route($route, $info?->id) : 'javascript:void(0)'); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageUrl): ?>
                        <img src="<?php echo e($imageUrl); ?>" alt="Image" class="img-thumbnail img-fix m-0">
                    <?php else: ?>
                        <div class="initial-letter"><?php echo e(strtoupper(substr($info?->name, 0, 1))); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <div class="user-details">
                    <a href="<?php echo e(isset($route) ? route($route, $info?->id) : 'javascript:void(0)'); ?>">
                        <h4 class="user-name">
                            <?php echo e($info?->name); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($ratings)): ?>
                                <div class="rate">
                                    <img src="<?php echo e(asset('admin/images/svg/star.svg')); ?>" alt="star" class="img-fluid star">
                                    <small><?php echo e($ratings); ?></small>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </h4>
                    </a>
                    <h6 class="user-email">
                        <a href="mailto:<?php echo e($info?->email); ?>"><?php echo e($info?->email); ?></a>
                        <i data-feather="copy" class="copy-icon-<?php echo e($info->id); ?>" data-email="<?php echo e($info?->email); ?>"></i>
                    </h6>
                </div>
            </div>
        <?php else: ?>
            <p class="no-date">N/A</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($categories)): ?>
        <div class="select-service-box">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="selected-booking">
                    <span class="text-capitalize"><?php echo e($category); ?></span>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                N/A
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<script>
    (function ($) {
        "use strict";
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        $(document).ready(function () {
            <?php if(isset($review)): ?>
                $("#updateReview").validate();
            <?php endif; ?>
            <?php if(isset($wallet)): ?>
                $("#creditOrdDebitForm").validate();
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.wallet.credit')): ?>
                    $(".credit").click(function () {
                        $('input[name="type"]').val('credit');
                        $(this).prop('disabled', true);
                        $(this).parents('form').submit();
                    });
                    $(".debit").click(function () {
                        $('input[name="type"]').val('debit');
                        $(this).prop('disabled', true);
                        $(this).parents('form').submit();
                    });
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($providerWallet)): ?>
                $("#providerCreditOrdDebitForm").validate();
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.provider_wallet.credit')): ?>
                    $(".credit").click(function () {
                        $('input[name="type"]').val('credit');
                        $(this).prop('disabled', true);
                        $(this).parents('form').submit();
                    });
                    $(".debit").click(function () {
                        $('input[name="type"]').val('debit');
                        $(this).prop('disabled', true);
                        $(this).parents('form').submit();
                    });
                <?php endif; ?>
            <?php endif; ?>

            var id = "<?php echo e(isset($info) ? $info->id : ''); ?>";
            var copyIcon = '.copy-icon-' + id;
            $(document).on('click', copyIcon, function () {
                const $icon = $(this);
                const email = $icon.data('email');
                const originalIcon = $icon.attr('data-feather');
                navigator.clipboard.writeText(email).then(() => {
                    $icon.attr('data-feather', 'check');
                    feather.replace();

                    setTimeout(() => {
                        $(this).attr('data-feather', 'copy');
                        feather.replace();
                    }, 1000);
                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            });
        });
        $('form').on('submit', function (e) {
            var $submitButton = $(document.activeElement);

            if ($submitButton.hasClass('spinner-btn')) {

                if (!$submitButton.closest('form').find('input[name="submit"]').length) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'submit',
                        value: $submitButton.val()
                    }).appendTo($submitButton.closest('form'));
                }


                if ($submitButton.find('.spinner').length === 0) {
                    $submitButton.append('<span class="spinner"></span>');
                    $submitButton.prop('disabled', true);
                }
            }
        });

        $('.delete-svg, .wallet-icon').each(function() {
            new bootstrap.Tooltip(this, {
            });
        });

    })(jQuery);
</script>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/inc/action.blade.php ENDPATH**/ ?>