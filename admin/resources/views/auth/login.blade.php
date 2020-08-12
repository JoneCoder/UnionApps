@include('layouts.include.head')
<body class="login-page">
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{ asset('images/login-page-img.png') }}" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Login To Digital Union</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn">
                                    <input type="radio" name="options" value="admin" id="admin" {{ (old('options') && old('options') == 'admin') ? 'checked' : '' }}>
                                    <div class="icon"><img src="{{ asset('images/briefcase.svg') }}" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    Software Manager
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" value="user" id="user" {{ (old('options') && old('options') == 'user') ? 'checked' : '' }}>
                                    <div class="icon"><img src="{{ asset('images/person.svg') }}" class="svg" alt=""></div>
                                    <span>I'm</span>
                                    Union Admin
                                </label>
                            </div>

                            @error('options')
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @if (!$errors->has('username'))
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            @endif

                            @error('username')
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @enderror
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="**********" name="password" required autocomplete="current-password">

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
                        <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">Remember</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="forgot-password"><a href="">Forgot Password</a></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                <div class="input-group mb-0">
                                    <a href="#" type="button" class="btn btn-outline-primary btn-lg btn-block" data-backdrop="static" data-toggle="modal" data-target="#login-modal"><i class="icon-copy fa fa-address-card-o" aria-hidden="true"></i> Login With Qr Scan</a>
                                    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="qrcode-login-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="login-box bg-white box-shadow border-radius-10">
                                                    <div class="login-title">
                                                        <h2 class="text-center text-primary">Login With Qr Scan</h2>
                                                    </div>
                                                    <div class="row pb-30">
                                                        <div class="col-sm-12" id="qr-error">

                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div id="reader" style="width: 100%; height: auto;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="input-group m-auto">
                                                                <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<script src="{{ mix('js/QRscanner.js') }}" defer></script>
</body>
</html>
