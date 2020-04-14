@foreach($recipes as $title => $recipe)			
    <div class="recipe">
		<a href="{{route('recipes.recipe', $recipe['id'])}}">{{ $title }}</a><br>
        @foreach($recipe['recipeIngredients'] as $key => $ingredient)			
        	<a class="button ingredientsList" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}  </a>
        @endforeach
        <br><p class="recipeUrl">Przepis zaczerpnięty ze strony: <a class="recipeUrl" href="{{ $recipe['url'] }}">{{ $recipe['url'] }}</a></p>
    </div>	
@endforeach