<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('home')); ?>" class="brand-link">
        <img src="<?php echo e(asset('images/poslg.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-bold"><?php echo e(config('app.name')); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(activeSegment('')); ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(activeSegment('products')); ?>">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('products.create')); ?>" class="nav-link <?php echo e(activeSegment('products/create')); ?>">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('orders.index')); ?>" class="nav-link <?php echo e(activeSegment('orders')); ?>">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Orders / Reports</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('customers.index')); ?>" class="nav-link <?php echo e(activeSegment('customers')); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('settings.index')); ?>" class="nav-link <?php echo e(activeSegment('settings')); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH C:\Laravel\POS-Laravel\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>