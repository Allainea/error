<style>
    .user-avatar {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
    }

    .navbar-nav li {
        list-style: none;
    }
    .user-avatar {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
    }

    .user-name {
        font-weight: bold;
    }

    .user-role {
        font-size: 0.9em;
    }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="<?php echo e(route('home')); ?>" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <span id="current-time" class="nav-link" style="font-weight: bold;"></span>
        </li>
    </ul>






    <!-- Right navbar links -->


    <ul class="navbar-nav ml-auto">
        <!-- User Account Dropdown Menu -->

        <div class="text-center">
            <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary btn-lg mr-2 custom-button">
                <i class="fas fa-cash-register"></i> POS
            </a>
        </div>




            <ul class="nav card p-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="user-name"><?php echo e(auth()->user()->getFullname()); ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('settings.index')); ?>">
                            <i class="fas fa-cogs mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- JavaScript to update current time, date, and country -->
<script>
    // Function to update current time, date, and country
    function updateDateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Add leading zeros if necessary
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Display current time in 24-hour format (change as needed)
        var formattedTime = hours + ":" + minutes + ":" + seconds;

        // Get current date
        var options = { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' };
        var formattedDate = new Intl.DateTimeFormat('en-US', options).format(currentTime);

        // Get country
        var country = Intl.DateTimeFormat().resolvedOptions().timeZone.split('/')[0];

        // Update the element with the current time, date, and country
        document.getElementById("current-time").textContent = country + ", " + formattedTime + ", " + formattedDate;
    }

    // Update current time, date, and country every second
    setInterval(updateDateTime, 1000);

    // Call the function immediately to display initial time, date, and country
    updateDateTime();
</script>
<?php /**PATH C:\Laravel\POS-Laravel\resources\views/layouts/partials/navbar.blade.php ENDPATH**/ ?>