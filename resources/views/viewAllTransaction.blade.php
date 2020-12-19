@extends('base')
<!-- styles css -->
<link href="{{ asset('css/view_all_transaction_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header name -->
    <div class="col-sm-12">
        <div class="page-header"><h1>View All Transaction</h1></div>
    </div>
    @yield('alltransaction-body')
</div>
@endsection