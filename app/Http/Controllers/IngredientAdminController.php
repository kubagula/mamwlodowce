<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Month;
use App\Type;
use Session;

class IngredientAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientsAll = Ingredient::all();
        $monthsAll = Month::all();
        $typesAll = Type::all();

        return view('admin.ingredients', ['ingredients' => $ingredientsAll, 'months' => $monthsAll, 'types' => $typesAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $onhome = (int) ($request['onhome'] ?? 0);

        $ingredient = Ingredient::firstOrCreate(['name' => $request['name'], 'slug' => $request['slug'], 'type_id' => $request['type_id'], 'onhome' => $onhome]);
        $ingredientId = $ingredient->id;

        $months = $request['months'];

        if (!empty($months)) {
            foreach ($months as $key => $month) {
                Ingredient::find($ingredientId)->months()->attach($month);
            }
        }

        $message = 'Dodano składnik';
        Session::flash('message', $message);

        return redirect()->action('IngredientAdminController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        $recipeWithIngredient = $ingredient->recipes->count();

        if ($recipeWithIngredient === 0) {
            Ingredient::destroy($id);
            $message = 'Składnik usunięto';
            $type = 'alert-info';
        } else {
            $message = 'Składnik jest użyty w przepisach, nie można go usunąć.';
            $type = 'alert-danger';
        }

        Session::flash('message', $message);
        Session::flash('alert-class', $type);

        return redirect()->action('IngredientAdminController@index');
    }
}
