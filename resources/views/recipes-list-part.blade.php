@forelse($recipes as $title => $recipe)
<div class="recipe">
    <a href="{{route('recipes.recipe', $recipe['slug'])}}">{{ $title }}</a><br>
    @foreach($recipe['recipeIngredients'] as $key => $ingredient)
    <a class="button ingredientsList" href="{{route('recipes.ingredients', $ingredient['slug'])}}">{{ $ingredient['name'] }} </a>
    @endforeach
    <br>
    <p class="recipeUrl">Przepis zaczerpnięty ze strony: <a class="recipeUrl" href="{{ $recipe['url'] }}" target="_blank">{{ $recipe['url'] }}</a></p>
</div>
@empty
<div class="recipe">
    Z tego nie da się nic ugotować :( Musisz mieć więcej skladników.
</div>
@endforelse