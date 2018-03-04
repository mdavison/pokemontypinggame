@extends('layouts.page')

@section('content')
    <div class="container">
        <h2>Pok&eacute;mon Typing Game</h2>
        <p>Type the name of the Pok&eacute;mon to catch it. When you type it correctly it will automatically get added to your collection.</p>
        <hr>
        <div class="row">
            <div class="col">
                <img id="pokemon" src="/img/pokemon/pokeball.png" data-pokemon-to-appear="{{ $pokemon->image }}" height="475" width="475">
            </div>
            <div class="col">
                <h1 id="word-to-type">{{ ucfirst($pokemon->name) }}</h1>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="word-input" placeholder="Type {{ ucfirst($pokemon->name) }}">
                    </div>
                </form>

                <div class="form-group">
                    <button type="button" class="btn btn-success invisible" id="next-word" data-next-word="{{ $pokemon->nextPokemonIndex($pokemon->index, Auth::user()) }}">Next <span class="oi oi-arrow-circle-right" title="icon circle right" aria-hidden="true"></span></button>
                </div>

                <div class="alert alert-success invisible" role="alert" id="add-to-collection-message">
                    Added {{ ucfirst($pokemon->name) }} to your collection!
                </div>

                <form action="/pokemon/user" method="post" id="add-pokemon" class="invisible">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="pokemon" value="{{ $pokemon->id }}">
                        <input type="hidden" name="user" id="user-id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    </div>
                </form>

            </div>
        </div><!-- /row -->
    </div>
@endsection

@section('scripts')
    <script src="/js/typing.js"></script>
@endsection