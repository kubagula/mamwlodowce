@extends('layouts.app')

@section('title', 'Strona główna')

@section('nav')
    @parent 
@endsection

@section('pageTitle')
<h1>Przepisy</h1>
@endsection

@section('content')
    <div class="recipes">
        <ul>
        @foreach ($recipes as $recipe)
            <li><a href="{{route('recipes.show', $recipe->id)}}">{{ $recipe->title }}</a></li>
            <hr>
        @endforeach
        </ul>
    </div>
@endsection
                