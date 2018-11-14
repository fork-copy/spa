@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Vocabularies</div>x
                <div class="card-body">
                    <form action="{{ route('vocabularies.update', $vocabulary->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="furigana"></label>
                            <input type="text" class="form-control @if($errors->first('furigana')) is-invalid @endif" name="furigana" id="furigana" value="{{ $vocabulary->furigana }}" placeholder="Furigana">
                        </div>
                        <div class="form-group">
                            <label for="hiragana"></label>
                            <input type="text" class="form-control @if($errors->first('hiragana')) is-invalid @endif" name="hiragana" id="hiragana" value="{{ $vocabulary->hiragana }}" placeholder="Hiragana">
                        </div>
                        <div class="form-group">
                            <label for="romaji"></label>
                            <input type="text" class="form-control @if($errors->first('romaji')) is-invalid @endif" name="romaji" id="romaji" value="{{ $vocabulary->romaji }}" placeholder="Romaji">
                        </div>
                        <div class="form-group">
                            <label for="meaningInEnglish"></label>
                            <textarea class="form-control" name="meaningInEnglish" id="meaningInEnglish" placeholder="In English">{{ $vocabulary->meaning_in_english }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meaningInBurmese"></label>
                            <textarea class="form-control" name="meaningInBurmese" id="meaningInBurmese" placeholder="In Burmese" >{{ $vocabulary->meaning_in_burmese }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
