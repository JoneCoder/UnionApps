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
                        <h2 class="text-center text-primary">Reset Password</h2>
                    </div>
                    <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="input-group custom">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                            @if (!$errors->has('email'))
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            @endif

                            @error('email')
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                            @if (!$errors->has('password'))
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
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

                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            @if (!$errors->has('password_confirmation'))
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            @endif

                            @error('password_confirmation')
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
