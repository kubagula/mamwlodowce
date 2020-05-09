@extends('layouts.app')

@section('title')
{{ (request()->is('przepisy')) ? 'Wszystkie przepisy na mamwlodowce' : 'Wszystkie przepisy w kategorii '.$category }}
@endsection

@section('nav')
@parent
@endsection

@section('pageTitle')
<h1>{{ (request()->is('przepisy')) ? 'Wszystkie przepisy na mamwlodowce' : 'Wszystkie przepisy w kategorii '.$category }} </h1>
@endsection


@section('content')
<div class="recipesContainer">
	<div class="searchRecipes">
		<p>Kategorie przepisów</p>
		<ul class="unordered-list">
			@foreach ($categories as $category)
			<!--<img style="width: 30px; height: 30px" src="{{ asset('images/categories/'.$category['photo'].'') }}"> -->
			<li><a class="categoriesList" href="{{route('recipes.categories', $category['slug'])}}">{{ $category['name'] }}</a></li>
			@endforeach
		</ul>
	</div>

	<div class="listRecipes">
		@foreach($recipes as $title => $recipe)
		<div class="recipe">
			<a href="{{route('recipes.recipe', $recipe['slug'])}}">{{ $title }} </a>
			<span class="recipeCategories">
				@foreach($recipe['recipeCategories'] as $key => $category)
				<a class="button" href="{{route('recipes.categories', $category['slug'])}}">{{ $category['name'] }}</a>
				@endforeach
			</span><br>

			<!-- <p>{{ $recipe['description'] }}</p> -->
			@foreach($recipe['recipeIngredients'] as $key => $ingredient)
			<a class="button ingredientsList" href="{{route('recipes.ingredients', $ingredient['slug'])}}">{{ $ingredient['name'] }} </a>
			@endforeach
			<br>
			<p class="recipeUrl">Przepis zaczerpnięty ze strony: <a class="recipeUrl" href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a></p>
		</div>
		@endforeach
	</div>
</div>
@endsection