<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesAll = Category::all();        

        return view('admin.categories', ['categories' => $categoriesAll]);
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
        if($request->hasFile('photo')){                        
                $file = $request->photo;                
                $destination = 'images/categories/';
                // $ext = $file->getClientOriginalExtension();
                $name = $file->getClientOriginalName();                                
                $file->move($destination, $name);                            
        }

        $category = Category::firstOrCreate(['name' => $request['name'], 'photo' => $name]); 

        $message = 'Dodano Kategorię';               
        Session::flash('message', $message);

        return redirect()->action('CategoryAdminController@index');
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
        Category::destroy($id);       
        
        $message = "Kategorię usunięto";
        Session::flash('message', $message);

        return redirect()->action('CategoryAdminController@index');
    }
}
