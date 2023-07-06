<?php $__env->startSection('content'); ?>
    <div id="cart">
        <?php if($errors->has('error')): ?>
            <div class="alert alert-danger">
                <?php echo e($errors->first('error')); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Open POS'); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/cart/index.blade.php ENDPATH**/ ?>