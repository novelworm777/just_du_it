@extends('viewAllTransaction')
@section('alltransaction-body')

    <div class="col-sm-6">
            <h4>Image</h4>
    </div>

    <!-- transaction date -->
    <div class="col-sm-3">
        <i>Transaction Date</i>
    </div>

    <!-- total price -->
    <div class="col-sm-2">
            <h4>Total Price</h4>
    </div>
@foreach ($headers as $header)
    
    
<div class="table_transaction">
    <!-- image -->
    
    <!-- user-id -->
    <div class="col-sm-6">
            <h4>{{ $header->user_id }}</h4>
    </div>

    <!-- transaction date -->
    <div class="col-sm-3">
        <i>{{ $header->transaction_date }}</i>
    </div>

    <!-- total price -->
    <div class="col-sm-2">
            <h4>Rp. {{ number_format($header->total_price) }}</h4>
    </div>

</div>
@endforeach 
    <div class="col-sm-12 centerize">
        <a href="/" class="btn btn-success" role="button">Back to Home</a>
    </div>

@endsection