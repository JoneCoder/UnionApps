@extends('layouts.app')

@section('content')
    @role('Super Admin')
    <div class="row">
        <div class="col-md-6 mb-30">
            <div class="pd-20 card-box height-100-p">
                <h4 class="h4 text-blue">লগ টাইম</h4>
                <div id="chart8"></div>
            </div>
        </div>
        <div class="col-md-6 mb-30">
            <div class="pd-20 card-box height-100-p">
                <h4 class="h4 text-blue">রিসার্চ এরিয়া</h4>
                <div id="chart9"></div>
            </div>
        </div>
    </div>
    <div class="row clearfix progress-box">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-blue text-white">
                            <i class="fa fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-blue weight-500 font-24">40</span>
                        <p class="weight-400 font-18">My Earnings</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Target</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">40</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-light-green text-white">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-light-green weight-500 font-24">50</span>
                        <p class="weight-400 font-18">Business Captured</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Target</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">50</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-light-green progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-light-orange text-white">
                            <i class="fa fa-list-alt"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-light-orange weight-500 font-24">2 Lakhs</span>
                        <p class="weight-400 font-18">Projects Complete</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Review</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">Good</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
                <div class="project-info clearfix">
                    <div class="project-info-left">
                        <div class="icon box-shadow bg-light-purple text-white">
                            <i class="fa fa-podcast"></i>
                        </div>
                    </div>
                    <div class="project-info-right">
                        <span class="no text-light-purple weight-500 font-24">5.1 Lakhs</span>
                        <p class="weight-400 font-18">Pending Business</p>
                    </div>
                </div>
                <div class="project-info-progress">
                    <div class="row clearfix">
                        <div class="col-sm-6 text-muted weight-500">Review</div>
                        <div class="col-sm-6 text-right weight-500 font-14 text-muted">Average</div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-light-purple progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else

        @cannot('Super Admin')
            <div class="row">
                <div class="col-md-6 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h4 class="h4 text-blue">পরিসংখ্যান চার্ট</h4>
                        <div id="chart8"></div>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <h4 class="h4 text-blue">মোট সেবা গ্রহীতা</h4>
                        <div id="chart9"></div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 mb-30">
                    <div class="pd-20 bg-white border-radius-4 box-shadow">
                        <h4 class="mb-20">পরিসংখ্যান </h4>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                নতুন নাগরিক আবেদনকারী
                                <span class="badge badge-danger badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                মোট নাগরিক সনদ প্রদান
                                <span class="badge badge-info badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                নতুন ট্রেড লাইসেন্স আবেদনকারী
                                <span class="badge badge-danger badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                মোট ট্রেড লাইসেন্স প্রদান
                                <span class="badge badge-primary badge-pill">5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                মেয়াদ উত্তীর্ণ ট্রেড লাইসেন্স
                                <span class="badge badge-warning badge-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ট্রেড লাইসেন্স নবায়ন আবেদন
                                <span class="badge badge-success badge-pill">5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                নতুন ওয়ারিশ সনদের আবেদনকারী
                                <span class="badge badge-danger badge-pill">7</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                মোট ওয়ারিশ সনদ প্রদান
                                <span class="badge badge-primary badge-pill">7</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-30">

                    <div class="card box-shadow">
                        <div class="card-header">
                            দ্রুত পরিচালনা করুন
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="">
                                            <img class="icon_title" src="{{ asset('images/icon/nagorik.png') }}" alt="image">
                                            <p>নাগরিক আবেদনকারীগন</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="">
                                            <img class="icon_title" src="{{ asset('images/icon/gallery.png') }}" alt="image">
                                            <p>ট্রেড লাইসেন্স আবেদনকারীগন </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="">
                                            <img class="icon_title" src="{{ asset('images/icon/profile.png') }}" alt="image">
                                            <p>ওয়ারিশ আবেদনকারীগন </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/cashin_small.png') }}" alt="image">
                                            <p>দৈনিক জমা</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" >
                                            <img class="icon_title" src="{{ asset('images/icon/accounting.png') }}" alt="image" >
                                            <p>দৈনিক খরচ </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/house.png') }}" alt="image" >
                                            <p>বসত ভিটা ও পেশাজীবি কর আদায় </p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/dailybank.png') }}" alt="image" >
                                            <p> ব্যাংকের টাকা বিনিময় </p>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/dailycollection.png') }}" alt="image" >
                                            <p>দৈনিক কালেকশন রিপোর্ট </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/daily_vat_collection.png') }}" alt="image" >
                                            <p>দৈনিক ভ্যাট কালেকশন রিপোর্ট</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row clearfix">

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 mb-30">
                    <div class="card box-shadow">
                        <div class="card-header">
                            একাউন্ট সমুহ
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="table-success">
                                        <th width="45%">একাউন্টের নাম</th>
                                        <th>একাউন্ট নং</th>
                                        <th>টাকার পরিমান</th>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 14px;">
                                    <tr class="table-active">
                                        <td>CASH ACCOUNT</td>
                                        <td>258967</td>
                                        <td>0000</td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>জন্ম-মৃত্যু নিবন্ধন </td>
                                        <td>345</td>
                                        <td>0000</td>
                                    </tr>
                                    <tr class="table-secondary">
                                        <td>নিজস্ব তহবিল</td>
                                        <td>34543</td>
                                        <td>000</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>উন্নয়ন তহবিলঃ অ.দ.ক.ক</td>
                                        <td>443543</td>
                                        <td>000</td>
                                    </tr>
                                    <tr class="table-danger">
                                        <td>উন্নয়ন তহবিলঃ এলজিএসপি</td>
                                        <td>435</td>
                                        <td>000</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>উন্নয়ন তহবিলঃ ভূমি হস্তান্তর কর ১%</td>
                                        <td>345</td>
                                        <td>000</td>
                                    </tr>

                                    <tr class="table">
                                        <td></td>
                                        <td>মোট</td>
                                        <td>000/-</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-30">

                    <div class="card box-shadow">
                        <div class="card-header">
                            রেজিষ্টার সমূহ
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/nagorik_register.png') }}" alt="image">
                                            <p>নাগরিক রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/traderegister.png') }}" alt="image">
                                            <p>ট্রেড লাইসেন্স রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/owarishregister.png') }}" alt="image">
                                            <p>ওয়ারিশ রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/bibidoregister.png') }}" alt="image">
                                            <p>বিবিধ রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" >
                                            <img class="icon_title" src="{{ asset('images/icon/taxregister.png') }}" alt="image" >
                                            <p>টেক্স আদায় রেজিষ্টার </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)">
                                            <img class="icon_title" src="{{ asset('images/icon/assesmentreister.png') }}" alt="image" >
                                            <p>এসেসমেন্ট রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/incomeregister.png') }}" alt="image" >
                                            <p>আয়ের রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/bayregister.png') }}" alt="image" >
                                            <p>ব্যয়ের রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="quick-manage">
                                        <a href="javascript:void(0)" target="_blank">
                                            <img class="icon_title" src="{{ asset('images/icon/bankregister.png') }}" alt="image" >
                                            <p>ব্যাংক রেজিষ্টার</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endcannot
        @endrole
@endsection

@section('scripts')
    <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}" defer></script>
@endsection
