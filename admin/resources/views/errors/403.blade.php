@extends('errors.layout')

@section('title', __('এক্সেস ডিনাইড'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
