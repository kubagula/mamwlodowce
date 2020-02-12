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
        }
        // dd($monthsIngredients);        
        return view('calendar', ['monthsIngredients' => $monthsIngredients]);
    }    
}
