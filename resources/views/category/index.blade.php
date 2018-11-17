@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-align-left">
            <a href="/category/create" class="btn btn-sm btn-primary">Add Category</a>
        </div>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/category/{{ $category->id }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
