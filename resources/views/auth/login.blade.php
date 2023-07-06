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
                <div class="card-header text-center font-weight-bold">{{ __('Login Page') }}</div>

                <div class="card-body text-center">
                    <img src="{{ asset('images/pos-brand.png') }}" alt="Logo" class="mx-auto d-block mt-3" style="max-width: 300px;">

                    <form method="POST" action="{{ route('login') }}" class="mx-auto">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-8 mx-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color: rgb(1, 38, 78); color: white;">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color: rgb(55, 81, 118); color: white; ::placeholder { color: rgba(255, 255, 255, 0.5); }" placeholder="{{ __('Email Address') }}">
                                </div>
                                @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color: rgb(55, 81, 118); color: white; ::placeholder { color: rgba(255, 255, 255, 0.5); }" placeholder="{{ __('Password') }}">
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary login-button">
                                    {{ __('Login') }}
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
