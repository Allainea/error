<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS | Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        body {
            background-image: url("https://cdn.govexec.com/media/featured/wwt6.gif");
            background-size: cover;
        }


        .form-label {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="center-content">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center font-weight-bold"><?php echo e(__('Login Page')); ?></div>

                <div class="card-body text-center">
                    <img src="<?php echo e(asset('images/pos-brand.png')); ?>" alt="Logo" class="mx-auto d-block mt-3" style="max-width: 300px;">

                    <form method="POST" action="<?php echo e(route('login')); ?>" class="mx-auto">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: rgb(1, 38, 78); color: white;">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus style="background-color: rgb(55, 81, 118); color: white; ::placeholder { color: rgba(255, 255, 255, 0.5); }" placeholder="<?php echo e(__('Email Address')); ?>">
                                </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: rgb(1, 38, 78); color: white;">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" style="background-color: rgb(55, 81, 118); color: white; ::placeholder { color: rgba(255, 255, 255, 0.5); }" placeholder="<?php echo e(__('Password')); ?>">
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary login-button">
                                    <?php echo e(__('Login')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH C:\Laravel\POS-Laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>