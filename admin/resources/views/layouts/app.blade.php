@include('layouts.include.head')
@include('layouts.include.header')
@include('layouts.include.sidebar')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px footer-position">
            <div class="page-header">
                <div class="row mb-2">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                @yield('content')
            </div>
        </div>
        @include('layouts.include.footer')
    </div>
</div>

@include('layouts.include.script')
@include('sweetalert::alert')
</body>
</html>
