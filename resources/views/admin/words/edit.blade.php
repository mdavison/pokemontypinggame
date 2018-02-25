@extends('admin.layouts.master')

@section('content')
    <h1>Edit {{ $word->word }}</h1>

    @include('admin.partials.errors')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="/admin/words/{{ $word->id }}">
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <input type="text" class="form-control" id="word" name="word" value="{{ $word->word }}">
                    </div>

                    <img src="/img/pokemon/thumbs/{{ $word->image }}">

                    <div class="form-group">
                        <label class="custom-file">
                            <input type="file" id="word-image-file" class="custom-file-input" name="image" value="{{ $word->image }}">
                            <span class="custom-file-control" data-content={{ $word->image }}></span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection