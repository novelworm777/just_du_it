@extends('base')
<!-- styles css -->
<link href="{{ asset('css/home_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    <!-- header -->
    <div class="col-sm-12">
        <div class="page-header"><h1>View All Shoe</h1></div>
    </div>
    <!-- show shoes -->
    @foreach ($shoes as $shoe)
        <div class="col-sm-4">
            <a href="/shoe={{ $shoe->id }}"><img src="{{ url('/') }}/assets/{{ $shoe->image }}" class="img-thumbnail" alt="No Image" id="shoe-img"></a>
            <div class="caption text-center">
                <a href="/shoe={{ $shoe->id }}">{{ $shoe->name }}</a>
                <p>Rp. {{ number_format($shoe->price) }}</p>
            </div>
        </div>
    @endforeach
    <!-- paginate pages -->
    <div class="col-sm-12" id="paging">{{ $shoes->withQueryString()->links() }}</div>
</div>
@endsection