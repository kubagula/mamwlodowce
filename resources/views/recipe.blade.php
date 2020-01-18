@extends('layouts.app')

@section('title') 
	{{ $recipe->title }}
@endsection

@section('nav')
    @parent 
@endsection

@section('pageTitle')
	<h1>{{ $recipe->title }}</h1>
@endsection

@section('content')
	<div class="recipeContainer">
		<div class="recipeInformations">
			<div class="recipeIngredients">
				<p>Składniki przepisu</p>
				@foreach ($recipeIngredients as $key => $ingredient)
	            		<div><a href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $key }} </a>{{ $ingredient['value'] }} {{ $ingredient['unit'] }}</div>
	        	@endforeach
			</div>

			<div class="recipeInformationCategories">
				<p>Kategorie przepisu</p>
				@foreach ($recipeCategories as $category)
	            		<div><img style="width: 30px; height: 30px" src="{{ asset('images/categories/'.$category['photo'].'') }}"><a class="categoriesList" href="{{route('recipes.categories', $category['id'])}}">{{ $category['name'] }}</a></div>
	        	@endforeach
			</div>
		</div>

	    <div class="recipeDetails">
	    	<div class="recipeDescription">
	        	<p>{!! nl2br($recipe->description) !!}</p>
	        </div>
	        <div class="recipeDescriptionUrl">
	        	Przepis zaczerpnięty ze strony: <a href="{{ $recipe->url }}">{{ $recipe->url }}</a>
	        </div>
	    </div>
	</div>
@endsection