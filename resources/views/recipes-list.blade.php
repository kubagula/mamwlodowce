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
			@foreach ($categories as $category)
            		<div><img style="width: 30px; height: 30px" src="{{ asset('images/categories/'.$category['photo'].'') }}"><a class="categoriesList" href="{{route('recipes.categories', $category['id'])}}">{{ $category['name'] }}</a></div>
        	@endforeach
		</div>

		<div class="listRecipes">
			@foreach($recipes as $title => $recipe)			
			    <div class="recipe">
					<h2><a href="{{route('recipes.recipe', $recipe['id'])}}">{{ $title }} </a>
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
			@endforeach
		</div>
	</div>
@endsection