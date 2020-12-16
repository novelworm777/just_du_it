@extends('base')
<!-- styles css -->
<link href="{{ asset('css/cart_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header name -->
    <div class="col-sm-12">
        <div class="page-header"><h1>View Cart</h1></div>
    </div>
    @yield('cart-body')
</div>
@endsection