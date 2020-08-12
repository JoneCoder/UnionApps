@include('layouts.include.head')
<body class="login-page">
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/forgot-password.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Confirm Password</h2>
                    </div>
                    <h6 class="mb-20">Please confirm your password before continuing.</h6>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="********">
                            @if (!$errors->has('password'))
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                </div>
                            @endif

                            @error('password')
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="row align-items-center">
                            <div class="col-5">
                                <div class="input-group mb-0">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="col-2">
                                <div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
                            </div>
                            <div class="col-5">
                                <div class="forgot-password">
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.include.script')
</body>
</html>
