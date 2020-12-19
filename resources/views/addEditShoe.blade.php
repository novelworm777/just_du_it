@extends('base')
<!-- styles css -->
<link href="{{ asset('css/add_edit_shoe_styles.css') }}" rel="stylesheet">
@section('body')
<div class="row">
    @if ($action == 'add')
        <!-- header name -->
        <div class="col-sm-12">
            <div class="page-header"><h1>Add Shoe</h1></div>
        </div>
        <form action="{{ route('add_shoe') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- error message -->
            @if(count($errors) > 0)
                <div class="alert alert-danger col-sm-12" role="alert">
                    Something is wrong:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- shoe name -->
            <div class="form-group mt-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Shoe Name" id="name">
            </div>
            <!-- shoe price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Shoe Price" id="price">
            </div>
            <!-- shoe decription -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Shoe Description" id="description"></textarea>
            </div>
            <!-- shoe image -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div id="submit-btn"><button class="btn btn-success" type="submit">Submit</button></div>
        </form>
    @elseif ($action == 'edit')
        <!-- header name -->
        <div class="col-sm-12">
            <div class="page-header"><h1>Edit Shoe</h1></div>
        </div>
        <form action="{{ route('edit_shoe', ['id' => $shoe->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- error message -->
            @if(count($errors) > 0)
                <div class="alert alert-danger col-sm-12" role="alert">
                    Something is wrong:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- shoe name -->
            <div class="form-group mt-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Shoe Name" id="name" value="{{ $shoe->name }}">
            </div>
            <!-- shoe price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Shoe Price" id="price" value="{{ $shoe->price }}">
            </div>
            <!-- shoe decription -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Shoe Description" id="description"></textarea>
            </div>
            <!-- shoe image -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <div id="submit-btn"><button class="btn btn-success" type="submit">Submit</button></div>
        </form>
    @endif
</div>
@endsection