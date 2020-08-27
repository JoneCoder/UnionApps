<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Base Path -->
    <meta name="path" content="{{ url('/') }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@guest ডিজিটালাইজ ইউনিয়ন পরিষদ @else @role('Super Admin')ডিজিটালাইজ ইউনিয়ন পরিষদ অ্যাডমিন @else ডিজিটালাইজ ইউনিয়ন পরিষদ @endrole @endguest @yield('title')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/ico" href="{{ asset('images/favicon/favicon.ico') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/icon-font.css') }}">
    @yield('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/styles/style.css') }}">
</head>
