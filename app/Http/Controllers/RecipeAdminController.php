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
    public function create(?array $oldData = null)
    {
        $ingredientsAll = Ingredient::orderBy('name')->get();
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
        $recipe->slug = $request->slug;
        $recipe->description = $request->description;
        $recipe->url = 'http://' . $request->url;

        // if slug doesn't already exist then save new recipe
        if (!$this->checkSlug($request->slug)) {
            $recipe->save();
            $recipeId = $recipe->id;

            $ingredients = $request['ingredients'];
            // $values = $request['value'];

            foreach ($ingredients as $key => $ingredient) {
                Recipe::find($recipeId)->ingredients()->attach($ingredient, ['value' => $request['value'][$key], 'unit_id' => $request['unit'][$key]]);
            }

            $categories = $request['categories'];

            foreach ($categories as $key => $category) {
                Recipe::find($recipeId)->categories()->attach($category);
            }

            $message = 'Dodano przepis';
            Session::flash('message', $message);

            return redirect()->action('RecipeAdminController@index');
        } else {
            //TODO dorobić powrót z danymi lub sprawdzanie po ajaxie
            $message = 'Taki slug już istnieje';
            Session::flash('message', $message);
            return $this->create();
        }
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

        $message = 'Przepis usunięto';
        Session::flash('message', $message);

        return redirect()->action('RecipeAdminController@index');
    }

    private function checkSlug(string $slug): bool
    {
        $checkSlug = Recipe::where('slug', 'like', '%' . $slug . '%')->count();
        return ($checkSlug === 0) ? false : true;
    }
}
