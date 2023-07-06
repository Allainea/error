<?php $__env->startSection('content-header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                  <h3><?php echo e($products_count); ?></h3>
                <p>Total Products</p>
              </div>
              <div class="icon">
              <i class="fas fa-dolly-flatbed"></i>
              </div>
              <a href="<?php echo e(route('products.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                  <h3><?php echo e($orders_count); ?></h3>
                <p>Orders Count</p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-line"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($income, 2)); ?></h3>
                <p>Total Income</p>
              </div>
              <div class="icon">
              <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


    </div>

    <div class="row">
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($income_today, 2)); ?></h3>

                <p>Daily Income</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo e($customers_count); ?></h3>

            <p>Total Customers</p>
          </div>
          <div class="icon">
          <i class="fas fa-users"></i>
          </div>
          <a href="<?php echo e(route('customers.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <!-- Weekly Sales -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($weekly_sales, 2)); ?></h3>
            <p>Weekly Sales</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-bar"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Monthly Sales -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo e(config('settings.currency_symbol')); ?> <?php echo e(number_format($monthly_sales, 2)); ?></h3>
            <p>Monthly Sales</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\POS-Laravel\resources\views/home.blade.php ENDPATH**/ ?>