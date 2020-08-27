@extends('errors.layout')

@section('title', __('দুঃখিত সেবা প্রদান করা যাচ্ছে না'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
