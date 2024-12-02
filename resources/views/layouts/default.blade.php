<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bst/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        @include('includes.header')
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            @include('includes.sidebar')
        </div>
        <div class="col-9">
            <div class="row">
            @yield('content')
            
            </div>

            <div class="row">
            @yield('con')
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        @include('includes.footer')
    </div>
</div>
