<?php $__env->startSection('content-header', 'Product List'); ?>
<?php $__env->startSection('content-actions'); ?>
<a href="<?php echo e(route('products.create')); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/products.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card product-list">
    <div class="card-body">
        <table class="table table-bordered table-hover custom-table">
            <thead class="thead-custom text-center custom-thead">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="custom-tbody">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="product-id"><?php echo e($product->id); ?></td>
                    <td><img class="product-img img-thumbnail custom-image" src="<?php echo e(Storage::url($product->image)); ?>" alt=""></td>
                    <td class="product-name"><?php echo e($product->name); ?></td>
                    <td class="product-barcode"><?php echo e($product->barcode); ?></td>
                    <td class="product-price"><?php echo e(config('settings.currency_symbol')); ?><?php echo e($product->price); ?></td>
                    <td class="product-quantity"><?php echo e($product->quantity); ?></td>
                    <td class="product-status">
                        <span class="badge badge-<?php echo e($product->status ? 'success' : 'danger'); ?>">
                            <?php echo e($product->status ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="pagination justify-content-center" style="margin-top: 20px;">
            <?php echo e($products->links()); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function () {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {_method: 'DELETE', _token: '<?php echo e(csrf_token()); ?>'}, function (res) {
                        $this.closest('tr').fadeOut(500, function () {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/products/index.blade.php ENDPATH**/ ?>