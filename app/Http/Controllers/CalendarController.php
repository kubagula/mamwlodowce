<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Month;
use App\Ingredient;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthsIngredients = array();

        $months = Month::all();
        foreach($months as $month) {
            foreach ($month->ingredients as $ingredient) {
                $monthsIngredients[$month->name][] = ['id' => $ingredient->id, 'name' => $ingredient->name];    
            }
            // $ingredients = Month::find($month->id)->ingredients()->orderBy('name');
            // $monthsIngredients[$month->name] = $ingredients; 
        }
        // $ingredients = Ingredient::all();
        // dd($monthsIngredients);
        return view('calendar', ['monthsIngredients' => $monthsIngredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
