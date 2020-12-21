@extends('viewTransaction')
@section('transaction-body')
@foreach ($transactions as $transaction)
    @if ($curr_transaction_id != $transaction->transaction_id)
        <div class="col-sm-12 transaction-header">
            <!-- show member username and transaction date and total price -->
            <div class="col-sm-6">
                <h4>Member: {{ $transaction->header_transaction->user->username }}</h4>
            </div>
            <div class="col-sm-3">
                <h4>Date: {{ $transaction->header_transaction->transaction_date }}</h4>
            </div>
            <div class="col-sm-3">
                <h4>Price: Rp. {{ number_format($transaction->header_transaction->total_price) }}</h4>
            </div>
        </div>
        <!-- change curr to new transaction id -->
        @php $curr_transaction_id = $transaction->transaction_id @endphp
    @endif
    <!-- show shoe(s) which are bought in transaction -->
    <div class="col-sm-2">
        <img src="{{ url('/') }}/assets/{{ $transaction->shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">        
    </div>
@endforeach
@endsection