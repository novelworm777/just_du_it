@extends('cart')
@section('cart-body')
@foreach ($carts as $cart)
    <!-- image -->
    <div class="col-sm-2 centerize">
        <img src="{{ url('/') }}/assets/{{ $cart->shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">
    </div>
    <!-- name -->
    <div class="col-sm-6">
        <h4>{{ $cart->shoe->name }}</h4>
    </div>
    <!-- quantity -->
    <div class="col-sm-1 centerize">
        <h4>{{ $cart->quantity }}</h4>
    </div>
    <!-- total price -->
    <div class="col-sm-2">
        <h4>Rp. {{ number_format($cart->quantity * $cart->shoe->price) }}</h4>
    </div>
    <!-- edit -->
    <div class="col-sm-1" id="edit-btn">
        <a href="/edit-cart={{ $cart->id }}" class="btn btn-success" role="button">Edit</a>
    </div>
@endforeach
<!-- check out -->
<div class="col-sm-12 centerize">
    <a href="/cart-checkout" class="btn btn-success" role="button">Check Out</a>
</div>
@endsection