<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Category;
use App\Unit;
use Session;
use Illuminate\Database\Eloquent\Builder;

class RecipeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipesAll = Recipe::all();        

        return view('admin.recipes', ['recipes' => $recipesAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredientsAll = Ingredient::all();
        $categoriesAll = Category::all();
        $unitsAll = Unit::all();

        return view('admin.recipes-create', ['ingredients' => $ingredientsAll, 'categories' => $categoriesAll, 'units' => $unitsAll]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $recipe = new Recipe;

        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->url = "http://".$request->url;

        $recipe->save(); 
        $recipeId = $recipe->id;    

        $ingredients = $request['ingredients'];
        $values = $request['value'];   

        foreach($ingredients as $key => $ingredient) {
            Recipe::find($recipeId)->ingredients()->attach($ingredient, ['value' => $request['value'][$key], 'unit_id' => $request['unit'][$key]]);
        }       

        $categories = $request['categories'];        

        foreach($categories as $key => $category) {
            Recipe::find($recipeId)->categories()->attach($category);
        }

        $message = "Dodano przepis";
        Session::flash('message', $message);

        return redirect()->action('RecipeAdminController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        return view('recipe', ['recipe' => $recipe]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        // dd($recipe);
        return view('admin.recipes-edit', ['recipe' => $recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo 'aaaa';
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::destroy($id);       
        
        $message = "Przepis usunięto";
        Session::flash('message', $message);

        return redirect()->action('RecipeAdminController@index');
    }
    
}
