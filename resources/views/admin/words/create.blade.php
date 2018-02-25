@extends('admin.layouts.master')

@section('content')
    <h1>Typing Game | Add New Word</h1>

    @include('admin.partials.errors')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="/admin/words">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" class="form-control" id="word" placeholder="Word" name="word">
                    </div>

                    <div class="form-group">
                        <label class="custom-file">
                            <input type="file" id="word-image-file" class="custom-file-input" name="image">
                            <span class="custom-file-control" data-content="Choose file..."></span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection