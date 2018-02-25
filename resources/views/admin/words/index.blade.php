@extends('admin.layouts.master')

@section('content')
            <h1>Typing Game Words</h1>

            <ul class="nav nav-pills justify-content-end">
                <li class="nav-item">
                    <a class="btn btn-primary" href="/admin/words/create" role="button"><span class="oi oi-plus" title="icon plus"></span> New Word</a>
                </li>
            </ul>

            <h2>All Words</h2>

            @if (!empty($words))
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Word</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($words as $word)
                                <tr>
                                    <td><img src="/img/pokemon/thumbs/{{ $word->image }}"></td>
                                    <td>{{ $word->word }}</td>
                                    <td><a class="btn btn-outline-secondary" href="/admin/words/{{ $word->id }}/edit" role="button">Edit</a></td>
                                    <td><a class="btn btn-outline-danger" href="/admin/words/{{ $word->id }}/delete" role="button">Delete</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endif

@endsection