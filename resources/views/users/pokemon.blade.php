@extends('layouts.page')

@section('styles')

@endsection

@section('content')
    <h1>My Pok&eacute;mon</h1>

    <hr>

    <div class="container">

        <div class="row">
            <div class="col-md-2 col-sm-1">
                <p>Filter</p>

                <p><a href="#" class="filter-show-all">Show All</a></p>

                @foreach ($letters as $letter)
                    <p><a href="#" class="filter-letter">{{ $letter }}</a></p>
                @endforeach
            </div>

            <div class="col">
                @if (!empty($pokemon))
                    <div class="row">
                    @foreach ($pokemon as $item)
                    <div class="col">
                        <div class="card pokemon-card" id="{{ $item->name }}">
                            <img class="card-img-top" src="/img/pokemon/thumbs/{{ $item->image }}" alt="Card image cap" height="100" width="100">
                            <div class="card-body">
                                <p class="card-title">{{ ucfirst($item->name) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div><!-- /.row -->
                @endif
            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.container -->

@endsection

@section('scripts')
    <script src="/js/my-pokemon.js"></script>
@endsection