<?php $__env->startSection('content-header', 'Products / Create Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">

        <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data" id="product-form">
            <?php echo csrf_field(); ?>

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
                    placeholder="Enter product name" value="<?php echo e(old('name')); ?>">
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
                    id="description" placeholder="Enter short description"><?php echo e(old('description')); ?></textarea>
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
                    <div id="image-preview-container" class="mt-2">
                        <div id="image-placeholder" class="d-flex align-items-center justify-content-center" style="width: 500px; height: 300px; border: 1px solid #ccc;">
                            <i class="fas fa-image fa-3x"></i>
                            <span class="ml-2">No Image Chosen</span>
                        </div>
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
unset($__errorArgs, $__bag); ?>" id="barcode" placeholder="Enter barcode number" value="<?php echo e(old('barcode')); ?>">
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
                    <input type="number" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price" placeholder="Enter price" value="<?php echo e(old('price')); ?>">
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
unset($__errorArgs, $__bag); ?>" id="quantity" placeholder="Quantity" value="<?php echo e(old('quantity', 1)); ?>">
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
                        <option value="1" <?php echo e(old('status') === 1 ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('status') === 0 ? 'selected' : ''); ?>>Inactive</option>
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

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-secondary btn-block btn-lg" type="button" onclick="goToProductIndex()">Cancel</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-success btn-block btn-lg" type="submit">Submit</button>
                    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    $('#product-form').submit(function(event) {
        var form = this;
        var fields = ['name', 'barcode', 'price', 'quantity', 'status'];
        var isValid = true;

        fields.forEach(function(field) {
            var fieldValue = $('#' + field).val();
            if (!fieldValue) {
                isValid = false;
                $('#' + field).addClass('is-invalid');
            } else {
                $('#' + field).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            event.preventDefault();
            swal("Fill up all the fields", "", "error");
        } else {
            event.preventDefault(); // Prevent the form from submitting immediately

            swal({
                title: "Save Information",
                text: "Are you sure you want to save the information?",
                icon: "warning",
                buttons: {
                    cancel: "No",
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn-primary",
                        closeModal: false
                    }
                }
            }).then(function(value) {
                if (value) {
                    var formSubmitButton = form.querySelector('[type="submit"]');
                    formSubmitButton.disabled = true; // Disable the submit button

                    swal({
                        title: "Saving...",
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        content: {
                            element: "div",
                            attributes: {
                                className: "loading-bar"
                            }
                        }
                    });

                    form.submit(); // Submit the form
                } else {
                    swal("Information not saved", "", "info");
                }
            });
        }
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function previewImage(input) {
        var imagePlaceholder = document.getElementById('image-placeholder');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePlaceholder.style.backgroundImage = "url('" + e.target.result + "')";
                imagePlaceholder.style.backgroundSize = "cover";
                imagePlaceholder.innerHTML = '';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            imagePlaceholder.style.backgroundImage = 'none';
            imagePlaceholder.innerHTML = '<i class="fas fa-image fa-3x"></i><span class="ml-2">No Image Chosen</span>';
        }
    }
</script>

<script>
    function goToProductIndex() {
        window.location.href = "<?php echo e(route('products.index')); ?>";
    }
</script>

<style>
    .loading-bar {
  width: 100%;
  height: 5px;
  background-color: #f8f9fa;
  position: relative;
  overflow: hidden;
}

.loading-bar:before {
  content: "";
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #007bff;
  animation: loading-bar-animation 2s linear infinite;
}

@keyframes loading-bar-animation {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/products/create.blade.php ENDPATH**/ ?>