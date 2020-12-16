@extends('base')
<!-- styles css -->
<link href="{{ asset('css/view_shoe_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header -->
    <div class="col-sm-12">
        <div class="page-header"><h1>{{ $shoe->name }}</h1></div>
    </div>
    <!-- image -->
    <div class="col-sm-5">
        <img src="assets/{{ $shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img">
    </div>

    
</div>
@endsection