@extends('base')
<!-- styles css -->
<link href="{{ asset('css/add_edit_cart_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header name -->
    <div class="col-sm-12">
        <div class="page-header"><h1>{{ $shoe->name }}</h1></div>
    </div>
    <!-- image -->
    <div class="col-sm-4">
        <img src="{{ url('/') }}/assets/{{ $shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">
    </div>
    <div class="col-sm-8">
        <ul class="list-group">
            @if ($action == 'add')
                <!-- price -->
                <li class="list-group-item price">
                    <h4>Rp. {{ number_format($shoe->price) }}</h4>
                </li>
                <!-- quantity -->
                <li class="list-group-item">
                    <form action="{{ route('add_cart', ['id' => $shoe->id]) }}" method="POST">
                        @csrf
                        <h4>Quantity</h4>
                        <input type="text" class="form-control" placeholder="Input quantity in here..." name="quantity" value="{{ old('quantity') }}" id="quantity">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>
                </li>
            @elseif ($action == 'edit')
                <!-- total price -->
                <li class="list-group-item price">
                    <h4>Rp. {{ number_format($cart->total_price) }}</h4>
                </li>
                <!-- quantity -->
                <li class="list-group-item">
                    <form action="{{ route('edit_cart', ['id' => $cart->id]) }}" method="POST">
                        @csrf
                        <h4>Quantity</h4>
                        <input type="text" class="form-control" placeholder="Input quantity in here..." name="quantity" value="{{ $cart->quantity }}" id="quantity">
                        <!-- update -->
                        <button class="btn btn-success" type="submit" href="/" id="update-btn">Update</button>
                        <!-- delete -->
                        <a href="/delete-cart={{ $cart->id }}" class="btn btn-success" role="button">Delete</a>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</div>
@endsection