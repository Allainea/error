<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('report.index')); ?>">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>

        <table class="table table-bordered table-hover" style="background-color: #526D82; text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th>Exchange</th>
                    <th>Date Added</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody style="background-color: #c3f0eb; text-align: center;">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->getCustomerName()); ?></td>
                    <td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedTotal()); ?></td>
                    <td><?php echo e(config('settings.currency_symbol')); ?> <?php echo e($order->formattedReceivedAmount()); ?></td>
                    <td>
                        <?php if($order->receivedAmount() == 0): ?>
                            <span class="badge badge-danger" style="background-color: red; color: white;">Not Paid</span>
                        <?php elseif($order->receivedAmount() < $order->total()): ?>
                            <span class="badge badge-warning" style="background-color: orange; color: white;">Partial</span>
                        <?php elseif($order->receivedAmount() == $order->total()): ?>
                            <span class="badge badge-success" style="background-color: green; color: white;">Paid</span>
                        <?php elseif($order->receivedAmount() > $order->total()): ?>
                            <span class="badge badge-info" style="background-color: blue; color: white;">Change</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e(config('settings.currency_symbol')); ?>

                        <?php echo e(number_format($order->receivedAmount() - $order->total(), 2)); ?>

                    </td>
                    <td><?php echo e($order->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('orders.print', $order->id)); ?>" class="btn btn-primary" target="_blank" rel="noopener noreferrer"><i class="fas fa-print"></i> Print</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>

                </tr>
            </tfoot>
        </table>
        <?php echo e($orders->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/report/index.blade.php ENDPATH**/ ?>