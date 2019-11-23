@extends('layouts.app')

@section('title', 'Przepis')

@section('nav')
    @parent 
@endsection

@section('pageTitle')
<h1>Przepis {{ $recipe->title }}</h1>
@endsection

@section('content')
    <div class="recipe">
        {{ $recipe->description }}
        Przepis zaczerpnięty ze strony: <a href="{{ $recipe->url }}">{{ $recipe->url }}</a>
    </div>
@endsection