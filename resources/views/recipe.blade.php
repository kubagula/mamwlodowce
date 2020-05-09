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
			<ul class="unordered-list">
				@foreach ($recipeIngredients as $key => $ingredient)
				<li><a href="{{route('recipes.ingredients', $ingredient['slug'])}}">{{ $key }} </a>{{ $ingredient['value'] }} {{ $ingredient['unit'] }}</li>
				@endforeach
			</ul>
		</div>

		<div class="recipeInformationCategories">
			<p>Kategorie przepisu</p>
			<ul class="unordered-list">
				@foreach ($recipeCategories as $category)
				<li><a class="categoriesList" href="{{route('recipes.categories', $category['slug'])}}">{{ $category['name'] }}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

	<div class="recipe">
		<div class="recipe">
			<p>{!! nl2br($recipe->description) !!}</p>
		</div>
		<div class="recipeUrl">
			Przepis zaczerpnięty ze strony: <a class="recipeUrl" href="{{ $recipe->url }}">{{ $recipe->url }}</a>
		</div>
	</div>
</div>
@endsection