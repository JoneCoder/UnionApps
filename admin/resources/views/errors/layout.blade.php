@include('layouts.include.head')
<body>
<div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="pd-10">
        <div class="error-page-wrap text-center">
            <h1>@yield('code')</h1>
            <h3>Error: @yield('code') @yield('message')</h3>
            <p>You Seem To Be Trying To Find His Way Home</p>
            <div class="pt-20 mx-auto max-width-200">
                <a href="{{ route('home') }}" class="btn btn-primary btn-block btn-lg">Back To Home</a>
            </div>
        </div>
    </div>
</div>
@include('layouts.include.script')
</body>
</html>
