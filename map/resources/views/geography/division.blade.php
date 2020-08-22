@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 offset-3">
            <div class="card card-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-9">
                            {{$dataTable->table()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
