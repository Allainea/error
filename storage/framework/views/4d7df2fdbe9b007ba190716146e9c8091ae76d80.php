<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('content-header', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">

        <form action="<?php echo e(route('products.update', $product)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                    placeholder="Name" value="<?php echo e(old('name', $product->name)); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    id="description"
                    placeholder="description"><?php echo e(old('description', $product->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage(this)">
                            <label class="custom-file-label" for="image">Choose File</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="image-preview-container" class="mt-2" style="width: 500px; height: 300px; border: 1px solid #ccc; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                        <?php if($product->image): ?>
                            <img id="preview-image" class="img-thumbnail" src="<?php echo e(Storage::url($product->image)); ?>" alt="Product Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        <?php else: ?>
                            <div id="placeholder-container" style="display: flex; flex-direction: column; align-items: center;">
                                <i class="fas fa-image fa-3x"></i>
                                <span class="ml-2">No Image Chosen</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>



            </div>
            <hr>

            <div class="form-row">
                <div class="form-group col">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="barcode" placeholder="barcode" value="<?php echo e(old('barcode', $product->barcode)); ?>">
                    <?php $__errorArgs = ['barcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group col">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price" placeholder="price" value="<?php echo e(old('price', $product->price)); ?>">
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group col">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="quantity" placeholder="Quantity" value="<?php echo e(old('quantity', $product->quantity)); ?>">
                    <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group col">
                    <label for="status">Status</label>
                    <select name="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status">
                        <option value="1" <?php echo e(old('status', $product->status) === 1 ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('status', $product->status) === 0 ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success btn-block btn-lg" type="submit">Save Changes</button>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary btn-block btn-lg">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<script>
    function previewImage(input) {
        var imagePreview = document.getElementById('image-preview-container');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.createElement('img');
                previewImage.classList.add('img-thumbnail');

                previewImage.onload = function() {
                    var containerWidth = imagePreview.offsetWidth;
                    var containerHeight = imagePreview.offsetHeight;
                    var imageWidth = previewImage.width;
                    var imageHeight = previewImage.height;

                    var widthRatio = containerWidth / imageWidth;
                    var heightRatio = containerHeight / imageHeight;
                    var scaleFactor = Math.min(widthRatio, heightRatio);

                    var scaledWidth = Math.floor(imageWidth * scaleFactor);
                    var scaledHeight = Math.floor(imageHeight * scaleFactor);

                    previewImage.style.width = scaledWidth + 'px';
                    previewImage.style.height = scaledHeight + 'px';
                };

                previewImage.src = e.target.result;
                previewImage.alt = 'Product Image';

                while (imagePreview.firstChild) {
                    imagePreview.firstChild.remove();
                }

                imagePreview.appendChild(previewImage);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            while (imagePreview.firstChild) {
                imagePreview.firstChild.remove();
            }

            var placeholderIcon = document.createElement('i');
            placeholderIcon.classList.add('fas', 'fa-image', 'fa-3x');

            var placeholderText = document.createElement('span');
            placeholderText.classList.add('ml-2');
            placeholderText.textContent = 'No Image Chosen';

            imagePreview.appendChild(placeholderIcon);
            imagePreview.appendChild(placeholderText);
        }
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/products/edit.blade.php ENDPATH**/ ?>