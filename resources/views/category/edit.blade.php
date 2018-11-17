@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control @if($errors->first('name')) is-invalid @endif" name="name" id="name" value="{{ $category->name }}" placeholder="Category Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
