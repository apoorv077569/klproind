<div class="form-group row">
    <label class="col-md-2" for="name"><?php echo e(__('static.language.languages')); ?></label>
    <div class="col-md-10">
        <ul class="language-list">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = \App\Helpers\Helpers::getLanguages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cat)): ?>
                    <li>
                        <a href="<?php echo e(route('backend.category.edit', ['category' => $cat->id, 'locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i data-feather="arrow-up-right"></i></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('backend.category.index', ['locale' => $lang->locale])); ?>" class="language-switcher <?php echo e(request('locale') === $lang->locale ? 'active' : ''); ?>" target="_blank"><img src="<?php echo e(@$lang?->flag ?? asset('admin/images/No-image-found.jpg')); ?>" alt=""> <?php echo e(@$lang?->name); ?> (<?php echo e(@$lang?->locale); ?>)<i data-feather="arrow-up-right"></i></a>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <li>
                    <a href="<?php echo e(route('backend.category.edit', ['category' => $cat->id, 'locale' => Session::get('locale', 'en')])); ?>" class="language-switcher active" target="blank"><img src="<?php echo e(asset('admin/images/flags/LR.png')); ?>" alt="">English<i data-feather="arrow-up-right"></i></a>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </div>
</div>


<input type="hidden" name="locale" value="<?php echo e(request('locale')); ?>">
<input type="hidden" name="category_type" value="service">
<div class="form-group row">
    <label class="col-md-2" for="title"><?php echo e(__('static.title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
    <div class="col-md-10 input-copy-box">
        <input class="form-control" type="text" name="title" id="title" placeholder="<?php echo e(__('static.categories.enter_title')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)" value="<?php echo e(isset($cat->title) ? $cat->getTranslation('title', request('locale', app()->getLocale())) : old('title')); ?>">
        <button class="btn ai-generate-btn" data-url="<?php echo e(route('backend.custom-ai-model.generate-title')); ?>" data-locale="<?php echo e(request('locale', app()->getLocale())); ?>" data-content_type="category" data-length="30">generate title</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
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
        <!-- Copy Icon -->
        <span class="input-copy-icon" data-tooltip="Copy">
            <i data-feather="copy"></i>
        </span>
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-2"><?php echo e(__('static.categories.description')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)<span> *</span></label>
    <div class="col-md-10 input-copy-box">
        <textarea class="form-control" placeholder="<?php echo e(__('static.categories.enter_description')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)" rows="4" name="description" cols="50"><?php echo e(isset($cat) ? $cat->getTranslation('description', request('locale', app()->getLocale())) : old('description')); ?></textarea>
        <button class="btn ai-generate-description-btn" data-url="<?php echo e(route('backend.custom-ai-model.generate-description')); ?>" data-locale="<?php echo e(request('locale', app()->getLocale())); ?>" data-content_type="category" data-length="150">generate content</button>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
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
        <!-- Copy Icon -->
        <span class="input-copy-icon" data-tooltip="Copy">
            <i data-feather="copy"></i>
        </span>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="commission"><?php echo e(__('static.categories.commission')); ?><span> *</span></label>
    <div class="col-md-10">
        <div class="input-group mb-3 flex-nowrap">
            <div class="w-100 percent">
                <input class='form-control' id="commission" type="number" name="commission" min="1" value="<?php echo e($cat->commission ?? old('commission')); ?>" placeholder="<?php echo e(__('static.categories.enter_commission')); ?>" oninput="if (value > 100) value = 100; if (value < 0) value = 0;">
            </div>
            <span class="input-group-text">%</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['commission'];
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

<div class="form-group row">
    <label class="col-md-2" for="parent_id"><?php echo e(__('static.categories.parent')); ?></label>
    <div class="col-md-10 error-div select-dropdown">
        <select class="select-2 form-control" name="parent_id" data-placeholder="<?php echo e(__('static.categories.parent_category')); ?>">
            <option class="select-placeholder" value=""></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allparent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key != @$cat->id): ?>
                    <option class="option" value="<?php echo e($key); ?>" <?php if(old('parent_id', isset($cat) ? $cat->parent_id : '') == $key): ?> selected <?php endif; ?>><?php echo e($option); ?></option>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['parent_id'];
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

<div class="form-group row">
    <label for="image" class="col-md-2"><?php echo e(__('static.provider.image')); ?> (<?php echo e(request('locale', app()->getLocale())); ?>)</label>
    <div class="col-md-10">
        <input class='form-control' type="file" accept=".jpg, .png, .jpeg" id="image" name="image">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['image'];
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

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cat)): ?>
    <?php
        $locale = request('locale');
        $mediaItems = $cat->getMedia('image')->filter(function ($media) use ($locale) {
            return $media->getCustomProperty('language') === $locale;
        });
    ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($mediaItems->count() > 0): ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="image-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mediaItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="image-list-detail">
                                <div class="position-relative">
                                    <img src="<?php echo e($media->getUrl()); ?>" id="<?php echo e($media->id); ?>"
                                        alt="Service Category Image" class="image-list-item">
                                    <div class="close-icon">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="form-group row">
    <label class="col-md-2" for="zones"><?php echo e(__('static.zone.zones')); ?><span> *</span> </label>
    <div class="col-md-10 error-div select-dropdown">
        <select id="blog_zones" class="select-2 form-control disable-all" id="zones[]" search="true" name="zones[]" data-placeholder="<?php echo e(__('static.zone.select-zone')); ?>" multiple>
            <option></option>
            <option value="all"><?php echo e(__('static.report.select_all')); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option value="<?php echo e($key); ?>" <?php echo e((is_array(old('zones')) && in_array($key, old('zones'))) || (isset($default_zones) && in_array($key, $default_zones)) ? 'selected' : ''); ?>><?php echo e($value); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['zones'];
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
        <span class="text-gray mt-1 d-block">
           <?php echo e(__('static.zone.to_add_new_zone')); ?>

            <a href="<?php echo e(route('backend.zone.create')); ?>" class="text-primary">
                <b><?php echo e(__('static.zone.here')); ?></b>
            </a>
        </span>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="status"><?php echo e(__('static.status')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cat)): ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1" <?php echo e($cat->status ? 'checked' : ''); ?>>
                <?php else: ?>
                    <input class="form-control" type="hidden" name="status" value="0">
                    <input class="form-check-input" type="checkbox" name="status" id="" value="1" checked>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2" for="is_featured"><?php echo e(__('static.categories.is_featured')); ?></label>
    <div class="col-md-10">
        <div class="editor-space">
            <label class="switch">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cat)): ?>
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="" value="1" <?php echo e($cat->is_featured ? 'checked' : ''); ?>>
                <?php else: ?>
                    <input class="form-control" type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="" value="1" checked>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('admin/js/jstree.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/custom-ai/ai-content-generation.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#categoryForm").validate({
                    ignore: [],
                    rules: {
                        "title": "required",
                        "description": "required",
                        "commission": "required",
                        "content": "required",
                        "zones[]": "required",
                        "image": {
                            accept: "image/jpeg, image/png"
                        },
                    },
                    messages: {
                        "image": {
                            accept: "Only JPEG and PNG files are allowed.",
                        },
                    }
                });
            });
            var tree_custom = {
                init: function() {
                    $('#treeBasic').jstree({
                        'core': {
                            'themes': {
                                'responsive': false,
                            },
                        },
                        'types': {
                            'default': {
                                'icon': 'ti-gallery'
                            },
                            'file': {
                                'icon': 'ti-file'
                            }
                        },
                        "search": {
                            "case_insensitive": true,
                            "show_only_matches": true
                        },
                        'plugins': ['types', 'search']
                    });

                    $('#search').keyup(function() {
                        $('#treeBasic').jstree('search', $(this).val());
                    });

                    $(document).on('click', '.edit-icon', function(e) {
                        var url = $(this).data('url')
                        window.location.href = url;
                    });

                    $(document).on('click', '.edit-child', function(e) {
                        var url = $(this).data('url')
                        window.location.href = url;
                    });
                }
            };
            $(document).ready(function() {
                tree_custom.init();

                setTimeout(function() {
                    $('.jstree-loader').fadeOut('slow');
                    $('#treeBasic').show();
                }, 500);
            });
            $('.disable-all').on('change', function() {
                const $currentSelect = $(this);
                const selectedValues = $currentSelect.val();
                const allOption = "all";

                if (selectedValues && selectedValues.includes(allOption)) {

                    $currentSelect.val([allOption]);
                    $currentSelect.find('option').not(`[value="${allOption}"]`).prop('disabled', true);
                } else {

                    $currentSelect.find('option').prop('disabled', false);
                }
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Apoorv Rathore\Desktop\Full Stack Training\klpro_admin\resources\views/backend/category/fields.blade.php ENDPATH**/ ?>