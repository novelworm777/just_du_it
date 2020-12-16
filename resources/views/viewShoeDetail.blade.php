@extends('base')
<!-- styles css -->
<link href="{{ asset('css/view_shoe_detail_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header name -->
    <div class="col-sm-12">
        <div class="page-header"><h1>{{ $shoe->name }}</h1></div>
    </div>
    <!-- image -->
    <div class="col-sm-4">
<<<<<<< HEAD
        <img src="assets/{{ $shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">
=======
        <img src="{{ url('/') }}/assets/{{ $shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">
>>>>>>> 62e3a763170ca9af8a2b9fb6a502105ad6ef7e63
    </div>
    <div class="col-sm-8">
        <ul class="list-group">
            <!-- price -->
            <li class="list-group-item">
                <h4>Rp. {{ number_format($shoe->price) }}</h4>
            </li>
            <!-- description -->
            <li class="list-group-item" id="description">
                <h4>Description</h4>
                <p>{{ $shoe->description }}</p>
            </li>
            @if ($role == 'member')
                <!-- add to cart -->
                <li class="list-group-item">
                    <a href="/shoe={{ $shoe->id }}/add-to-cart">Add to Cart</a>
                </li>
            @elseif ($role == 'admin')
                <!-- update shoe -->
                <li class="list-group-item">
                    <a href="/shoe={{ $shoe->id }}/update-shoe">Update Shoe</a>
                </li>
            @endif
        </ul>
    </div>
</div>
@endsection