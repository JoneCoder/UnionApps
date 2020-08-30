@extends('layouts.app')
@section('styles')
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4><i class="icon-copy fa fa-bank" aria-hidden="true"></i> ওয়েবসাইট ম্যানেজমেন্ট</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">ড্যাশবোর্ড</a></li>
                        <li class="breadcrumb-item hover" aria-current="page">সেটিংস</li>
                        <li class="breadcrumb-item" aria-current="page">ওয়েবসাইট ম্যানেজমেন্ট</li>
                        <li class="breadcrumb-item active" aria-current="page">ইউপি স্থায়ী কমিটির</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection

@section('scripts')
@endsection
