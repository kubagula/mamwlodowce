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

			@forelse($ingredients as $key => $ingredient)				
				@if ($key != $ingredientId)
					<div class="ingredientsInRecipes">
						<a class="ingredientsList" id="ingredientsList{{ $key }}" href="{{route('recipes.ingredients', $key)}}">{{ $ingredient }}  </a>
						<img data-ingredient-id = "{{ $key }}" class="deleteIngredient" src="{{ asset('images/nook.png') }}">
						<img data-ingredient-id-ok = "{{ $key }}" class="imageOk" src="{{ asset('images/ok.png') }}">
					</div>				
				@endif
			@empty
				Nie ma składnika 
			@endforelse 			
		</div>
		

		<div class="listRecipes" id="listRecipes">
			@forelse($recipes as $title => $recipe)			
			    <div class="recipe">
					<h2><a href="{{route('recipes.recipe', $recipe['id'])}}">{{ $title }}</a>
						<span class="recipeCategories">	
						(						
							@foreach($recipe['recipeCategories'] as $key => $category)			
					        	<a href="{{route('recipes.categories', $category['id'])}}">{{ $category['name'] }}</a> 
					        @endforeach					        
					    )
				    	</span>
					</h2>	
			        <!-- <p>{{ $recipe['description'] }}</p> -->
			        @foreach($recipe['recipeIngredients'] as $key => $ingredient)			
			        	<a class="ingredientsList" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}  </a>
			        @endforeach
			        <br><p class="recipeUrl">Przepis zaczerpnięty ze strony: <a href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a></p>
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
    	$(".imageOk").hide();
    });
</script>

@endsection