@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-align-left">
            <a href="/vocabularies/create" class="btn btn-sm btn-primary">Add Vocabulary</a>
        </div>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hiragana</th>
                    <th scope="col">English</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @foreach($vocabularies as $vocabulary)
                    <tr>
                        <th scope="row">{{ $vocabulary->id }}</th>
                        <td>{{ $vocabulary->hiragana }}</td>
                        <td>{{ $vocabulary->meaning_in_english }}</td>
                        <td>
                            <a href="/vocabularies/edit/{{ $vocabulary->id }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
