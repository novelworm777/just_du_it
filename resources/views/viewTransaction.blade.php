@extends('base')
<!-- styles css -->
<link href="{{ asset('css/view_transaction_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header name -->
    <div class="col-sm-12">
        @if ($role == 'admin')
            <div class="page-header"><h1>View All Transaction</h1></div>
        @elseif ($role == 'member')
            <div class="page-header"><h1>View Transaction</h1></div>
        @endif
    </div>
    @yield('transaction-body')
</div>
@endsection