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
			@foreach($ingredients as $key => $ingredient)
				<p><a class="ingredientsList" href="{{route('recipes.ingredients', $key)}}">{{ $ingredient }}  </a><a href="#"><img style="width: 15px; height: 15px" src="{{ asset('images/cross.png') }}" onclick="javascript:addSessionStorageShortage( {{ $key }} );"></a></p> 
			@endforeach
		</div>		

		<div class="listRecipes" id="listRecipes">
			@foreach($recipes as $title => $recipe)			
			    <div class="recipe">
					<h2><a href="{{route('recipes.recipe', $recipe['id'])}}">{{ $title }}</a></h2>	
			        <!-- <p>{{ $recipe['description'] }}</p> -->
			        @foreach($recipe['recipeIngredients'] as $key => $ingredient)			
			        	<a class="ingredientsList" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}  </a>
			        @endforeach
			        <br><p class="recipeUrl">Przepis zaczerpnięty ze strony: <a href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a></p>
			    </div>	
			@endforeach
		</div>
	</div>
	<div id="div1"></div>

<script type="text/javascript">
    $(document).ready(function() {
    	addIngredientStart();
    });
</script>

@endsection