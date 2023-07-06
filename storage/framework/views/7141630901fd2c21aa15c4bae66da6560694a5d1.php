<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        .invoice {
            font-family: Arial, sans-serif;
            font-size: 12px;
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header img {
            max-width: 100px;
        }

        .invoice-info {
            margin-bottom: 20px;
        }

        .invoice-info-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .invoice-items {
            margin-bottom: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .invoice-items th,
        .invoice-items td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .invoice-total {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .barcode img {
            max-width: 200px;
        }

        hr {
            border: 1px solid #ccc;
            margin: 20px 0;
        }
        .peso-sign::before {
            content: "\20B1";
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>POS Solutions</h1>
        </div>
        <div class="invoice-info">
            <div class="invoice-info-item">
                <span>Order ID:</span>
                <span><?php echo e($order->id); ?></span>
            </div>
            <div class="invoice-info-item">
                <span>Date:</span>
                <span><?php echo e($order->created_at->format('Y-m-d')); ?></span>
            </div>
            <div class="invoice-info-item">
                <span>Time:</span>
                <span><?php echo e($order->created_at->format('H:i:s')); ?></span>
            </div>
        </div>
        <hr>
        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->name); ?></td>
                        <td>P<?php echo e(number_format($product->price, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <hr>
        <div class="invoice-info-item">
            <span>Received Amount:</span>
            <span>P<?php echo e(number_format($order->receivedAmount(), 2)); ?></span>
        </div>
        <div class="invoice-info-item">
            <span>Exchange:</span>
            <span>P<?php echo e(number_format($order->receivedAmount() - $order->total(), 2)); ?></span>
        </div>
        <hr>
        <div class="invoice-total">
            <span>Total:</span>
            <span>P<?php echo e(number_format($order->total(), 2)); ?></span>
        </div>
        <hr>
        <div class="barcode">
            <h3>Thank you for your purchase!</h3>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel\POS-Laravel\resources\views/orders/invoice.blade.php ENDPATH**/ ?>