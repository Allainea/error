<!-- resources/views/orders/insufficient-payment.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="modal">
        <div class="modal-content">
            <h2>Insufficient Payment Amount</h2>
            <p>Please enter a higher amount to proceed with the order.</p>
            <button onclick="closeModal()">OK</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function closeModal() {
            // Close the modal or perform any other necessary action
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/orders/insufficient-payment.blade.php ENDPATH**/ ?>