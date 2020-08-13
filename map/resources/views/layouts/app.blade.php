@include('layouts.include.head')
@include('layouts.include.header')
@include('layouts.include.sidebar')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                @yield('content')
            </div>
        </div>
        @include('layouts.include.footer')
    </div>
</div>

@include('layouts.include.script')
</body>
</html>
