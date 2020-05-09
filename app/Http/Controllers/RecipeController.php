<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Recipe;
use App\Ingredient;
use App\Category;
use App\Unit;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipesAll = Recipe::all();
        // $categoriesAll = Category::all();
        $categoriesAll = Category::has('recipes')->get();
        // dd($categoriesAll);

        foreach ($recipesAll as $recipe) {
            $recipes[$recipe->title] = ['slug' => $recipe->slug, 'id' => $recipe->id, 'description' => $recipe->description, 'url' => $recipe->url, 'recipeIngredients' => $recipe->ingredients, 'recipeCategories' => $recipe->categories];
        }
        // dd($categoriesAll);        
        return view('recipes-list', ['recipes' => $recipes, 'categories' => $categoriesAll]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recipesWithIngredient(Ingredient $slug)
    {
        $ingredient = Ingredient::find($slug->id);

        if (count($ingredient->recipes) > 0) {
            $recipes = array();

            foreach ($ingredient->recipes as $recipe) {
                foreach ($recipe->ingredients as $ingredientInRecipe) {
                    $ingredients[$ingredientInRecipe->id] = $ingredientInRecipe->name;
                }

                $recipes[$recipe->title] = ['slug' => $recipe->slug, 'id' => $recipe->id, 'description' => $recipe->description, 'url' => $recipe->url, 'recipeIngredients' => $recipe->ingredients, 'recipeCategories' => $recipe->categories];
            }
        } else {
            $recipes = [];
            foreach (Ingredient::all() as $ingredientInRecipe) {
                $ingredients[$ingredientInRecipe->id] = $ingredientInRecipe->name;
            }
        }

        return view('recipes-with', ['recipes' => $recipes, 'ingredientName' => $ingredient->name, 'ingredientId' => $slug->id, 'ingredients' => $ingredients], compact('slug'));
        // return redirect()->action('RecipeController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id category
     * @return \Illuminate\Http\Response
     */
    public function recipeInCategories(Category $slug)
    {
        $category = Category::find($slug->id);
        // dd($category);
        $categoriesAll = Category::all();
        $recipes = array();

        foreach ($category->recipes as $recipe) {
            foreach ($recipe->ingredients as $ingredient) {
                $ingredients[$ingredient->id] = $ingredient->name;
            }

            $recipes[$recipe->title] = ['slug' => $recipe->slug, 'id' => $recipe->id, 'description' => $recipe->description, 'url' => $recipe->url, 'recipeIngredients' => $recipe->ingredients, 'recipeCategories' => $recipe->categories];
        }

        return view('recipes-list', ['recipes' => $recipes, 'category' => $category->name, 'categories' => $categoriesAll], compact('slug'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectedRecipes(Request $request)
    {
        $ingredientStart = json_decode($request->ingredientStart, true);
        $ingredientStartId = intval($ingredientStart['id']);

        $ingredientsShortage = json_decode($request->ingredientsShortage, true);

        // if(empty($ingredientsShortage)) {
        //    return redirect()->action('RecipeController@recipesWithIngredient', ['id' => $ingredientStartId]);
        // }

        $whereCondition = array();

        foreach ($ingredientsShortage as $value) {
            array_push($whereCondition, $value['id']);
        }
        $whereCondition = array_unique($whereCondition);

        $ingredientStartToSql = [];
        foreach ($ingredientStart as $ingredient) {
            $ingredientStartToSql[] = (int) $ingredient;
        }

        array_walk($whereCondition, function (&$element) {
            $element = (int) $element;
        });

        if (empty($ingredientsShortage)) {
            $results = DB::select(
                DB::raw("SELECT r.id FROM recipes r JOIN ingredient_recipe ir ON ir.recipe_id = r.id join ingredients i on ir.ingredient_id = i.id where i.id in (" . implode(',', $ingredientStartToSql) . ")")
            );
        } else {
            $results = DB::select(
                DB::raw("SELECT r.id FROM recipes r JOIN ingredient_recipe ir ON ir.recipe_id = r.id join ingredients i on ir.ingredient_id = i.id where i.id in (" . implode(',', $ingredientStartToSql) . ") and r.id not in (SELECT r.id FROM recipes r JOIN  ingredient_recipe ir ON ir.recipe_id = r.id join ingredients i on ir.ingredient_id = i.id where i.id in (" . implode(',', $whereCondition) . ") )")
            );
        }

        // dd($results);
        $recipes = [];
        foreach ($results as $result) {
            $recipe = Recipe::find($result->id);
            $recipes[$recipe->title] = ['slug' => $recipe->slug, 'id' => $recipe->id, 'description' => $recipe->description, 'url' => $recipe->url, 'recipeIngredients' => $recipe->ingredients];
        }

        return view('recipes-list-part', ['recipes' => $recipes]);
    }

    public function recipe(Recipe $slug)
    {
        // dd($title->id);
        $recipe = Recipe::find($slug->id);

        $recipeCategories = $recipe->categories;

        foreach ($recipe->ingredients as $ingredient) {
            $unit = Unit::find($ingredient->pivot->unit_id);
            $recipeIngredients[$ingredient['name']] = ['slug' => $ingredient['slug'], 'id' => $ingredient['id'], 'value' => $ingredient->pivot->value, 'unit' => $unit->name];
        }

        // dd($recipeIngredients);

        return view('recipe', ['recipe' => $recipe, 'recipeIngredients' => $recipeIngredients, 'recipeCategories' => $recipeCategories], compact('slug'));
    }

    // public function getRouteKeyName()
    // {
    //     return 'title';
    // }
}
