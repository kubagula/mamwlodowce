<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $recipes = Recipe::all();
        // return view('home', ['recipes' => $recipes]);       
        $ingredients = Ingredient::where('onhome', 1)->get();

        // $categories = Category::has('recipes')->get(); 
        $categories = Category::all();

        // $lastRecipes = Recipe::orderBy('id', 'desc')->take(5)->get();
        // dd($lastRecipes);

        // $lastAddedRecipes = array();

        // foreach ($lastRecipes as $key => $value) {
        //     $categoriesLastRecipes = Recipe::find($value->id)->categories()->orderBy('name')->get();
        //     // var_dump($value->id);
        //     $lastAddedRecipes[$value->id]['title'] = $value->title;
        //     $lastAddedRecipes[$value->id]['categories'] = array();

        //     foreach($categoriesLastRecipes as $category) {                             
        //         $lastAddedRecipes[$value->id]['categories'][$category->id] = $category->name;                
        //     }
            
        // }        
        // dd($lastAddedRecipes);

        return view('home', ['ingredients' => $ingredients, 'categories' => $categories, /*'lastAddedRecipes' => $lastAddedRecipes*/]);
    }    

    // public function admin()
    // {
    //     return view('admin.dashboard');
    // }
}
