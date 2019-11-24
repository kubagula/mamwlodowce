@extends('layouts.app')

@section('title')
	Przepisy zawierające: {{ $ingredient }}
@endsection

@section('nav')
    @parent 
@endsection

@section('pageTitle')
		<h1>Przepisy zawirające: {{ $ingredient }}</h1>
@endsection

@section('content')
	@foreach($recipes as $key => $recipe)			
	    <div class="recipe">
			<h2>Przepis {{ $key }}</h2>	
	        <p>{{ $recipe['description'] }}</p>
	        <br>Przepis zaczerpnięty ze strony: <a href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a>
	    </div>	
	@endforeach
@endsection