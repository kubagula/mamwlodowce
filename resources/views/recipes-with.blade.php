@extends('layouts.app')

@section('title')
Przepisy zawierające: {{ $ingredientName }}
@endsection


@section('nav')
@parent
@endsection

@section('pageTitle')
<h1>Przepisy zawierające: {{ $ingredientName }}</h1>
<input type="hidden" id="ingredientStart" value="{{ $ingredientId }}"></input>
@endsection

@section('content')
<div class="recipesContainer">
	<div class="searchRecipes">
		<p>Usuń składniki których nie masz w domu:</p>
		<ul class="unordered-list">
			@forelse($ingredients as $key => $ingredient)
			@if ($key != $ingredientId)
			<li>
				<div class="ingredientsInRecipes">
					<a class="ingredientsList" id="ingredientsList{{ $key }}" href="{{route('recipes.ingredients', $key)}}">{{ $ingredient }} </a>

					<!-- Rounded switch -->
					<label class="switch">
						<input data-ingredient-id="{{ $key }}" class="switchIngredient" type="checkbox" name="switchIngredient" checked>
						<span class="slider round"></span>
					</label>
				</div>
			</li>
			@endif
			@empty
			Nie ma składnika
			@endforelse
		</ul>
	</div>


	<div class="listRecipes" id="listRecipes">
		@forelse($recipes as $title => $recipe)
		<div class="recipe">
			<a href="{{route('recipes.recipe', $recipe['slug'])}}">{{ $title }}</a>
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
		@empty
		<div class="recipe">
			Nie ma przepisów z tym składnikiem :(
		</div>
		@endforelse
	</div>
</div>
<div id="div1"></div>

<script type="text/javascript">
	$(document).ready(function() {
		addIngredientStart();
		turnOffIngredient();
		// allChecked();
		// $(".imageOk").hide();
	});
</script>

@endsection