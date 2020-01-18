@foreach($recipes as $title => $recipe)			
    <div class="recipe">
		<h2><a href="{{route('recipes.recipe', $recipe['id'])}}">{{ $title }}</a></h2>	
        @foreach($recipe['recipeIngredients'] as $key => $ingredient)			
        	<a class="ingredientsList" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}  </a>
        @endforeach
        <br><p class="recipeUrl">Przepis zaczerpnięty ze strony: <a href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a></p>
    </div>	
@endforeach