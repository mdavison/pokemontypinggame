@extends('admin.layouts.master')

@section('content')
    <h1>Typing Game Word</h1>

    <h2>{{ $word->word }}</h2>

    <img src="/img/pokemon/{{ $word->image }}">

@endsection