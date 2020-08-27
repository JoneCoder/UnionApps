@include('layouts.include.head')
@include('layouts.include.header')
@include('layouts.include.sidebar')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px footer-position">
            @yield('breadcrumb')
            @yield('content')
        </div>
        @include('layouts.include.footer')
    </div>
</div>

@include('layouts.include.script')
@include('sweetalert::alert')
</body>
</html>
