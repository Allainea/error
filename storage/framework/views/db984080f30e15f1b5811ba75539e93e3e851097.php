<!-- sales/report.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Sales Report</h1>

        <!-- Filtering options -->
        <form action="<?php echo e(route('sales.report')); ?>" method="get">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4 d-flex align-items-end justify-content-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </form>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>


        <!-- Sales report table -->
        <table class="table table-bordered table-hover" style="background-color: #526D82; text-align: center;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sales->isEmpty()): ?>
                    <tr>
                        <td colspan="3">No sales records found.</td>
                    </tr>
                <?php else: ?>
                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sale->created_at->format('Y-m-d')); ?></td>
                            <td><?php echo e($sale->customer->first_name); ?> <?php echo e($sale->customer->last_name); ?></td>
                            <td>$<?php echo e(number_format($sale->total_amount, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>




        <!-- Pagination links -->
        <div class="pagination">
            <?php echo e($sales->links()); ?>

        </div>


        <!-- Summary table -->
        <h2>Summary</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Total Sales</th>
                    <th>Number of Sales</th>
                    <th>Total Customers Served</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$<?php echo e(number_format($totalSales, 2)); ?></td>
                    <td><?php echo e($numberOfSales); ?></td>
                    <td><?php echo e($totalCustomers); ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Top 5 products table -->
        <h2>Top 5 Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity Sold</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterate over the top 5 products data and display each row -->
                <?php $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->product->name); ?></td>
                        <td><?php echo e($product->total_quantity); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Print button -->
        <button onclick="window.print()" class="btn btn-primary">Print</button>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/sales/report.blade.php ENDPATH**/ ?>