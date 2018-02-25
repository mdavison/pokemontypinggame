@extends('admin.layouts.master')

@section('content')
    <h1>Confirm Delete</h1>

    @include('admin.partials.errors')

    <p>Are you sure you want to delete {{ $word->word }}?</p>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="/admin/words/{{ $word->id }}">
                    {{ csrf_field() }}

                    {{ method_field('DELETE') }}

                    <div class="form-group">
                        <img src="/img/pokemon/thumbs/{{ $word->image }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Yes</button>
                    <a class="btn btn-secondary" href="/admin/words" role="button">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection