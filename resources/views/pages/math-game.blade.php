@extends('layouts.page')

@section('content')
    <div class="container">
        <h2>Pokemon Math Game</h2>
        <hr>

        <div class="row">
            <div class="col">
                <img id="pokemon" src="/img/pokemon/pokeball.png" data-pokemon-to-appear="{{ $pokemon->image }}" data-pokemon-name="{{ $pokemon->name }}" height="475" width="475">
                <span id="pokemon-to-lose" data-pokemon-to-lose-image="{{ $pokemonToLoseImage }}" data-pokemon-to-lose-name="{{ $pokemonToLoseName }}"></span>
            </div>
            <div class="col">
                <h2>{{ $equation->question }} <span id="answer" data-answer="{{ $equation->answer }}"></span></h2>
                <form>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-huge" value="{{ $equation->choice1 }}">{{ $equation->choice1 }}</button>
                        <button type="button" class="btn btn-primary btn-huge" value="{{ $equation->choice2 }}">{{ $equation->choice2 }}</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-huge" value="{{ $equation->choice3 }}">{{ $equation->choice3 }}</button>
                        <button type="button" class="btn btn-primary btn-huge" value="{{ $equation->choice4 }}">{{ $equation->choice4 }}</button>
                    </div>
                </form>

                <div class="form-group">
                    <button type="button" class="btn btn-success invisible" id="next-equation" data-next-equation="{{ $equation->getNextEquationID() }}">Next <span class="oi oi-arrow-circle-right" title="icon circle right" aria-hidden="true"></span></button>
                </div>

                <div class="alert alert-success invisible" role="alert"></div>

                <form action="/pokemon/user" method="post" id="add-pokemon" class="invisible">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="pokemon" value="{{ $pokemon->id }}">
                        <input type="hidden" name="user" id="user-id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    </div>
                </form>

                <form action="/pokemon/user" method="POST" id="lose-pokemon" class="invisible">
                    <div class="form-group">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="remove-pokemon" id="pokemon-to-lose-id" value="{{ $pokemonToLoseID }}">
                        <input type="hidden" name="user" id="user-id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    </div>
                </form>
            </div>
        </div><!-- /row -->

    </div>
@endsection

@section('scripts')
    <script src="/js/math.js"></script>
@endsection