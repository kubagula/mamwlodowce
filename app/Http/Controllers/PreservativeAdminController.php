<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preservative;
use Session;

class PreservativeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preservativesAll = Preservative::all();        

        return view('admin.preservatives', ['preservatives' => $preservativesAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.preservatives-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preservative = new Preservative;

        $preservative->code = $request->code;
        $preservative->name = $request->name;
        $preservative->description = $request->description;
        $preservative->category = $request->category;
        $preservative->bad = (int) ($request['bad'] ?? 0);

        $preservative->save(); 

        $message = 'Dodano sztuczny dodatek';               
        Session::flash('message', $message);

        return redirect()->action('PreservativeAdminController@index');
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
        Preservative::destroy($id);       
        
        $message = "Sztuczny dodatek usunięto";
        Session::flash('message', $message);

        return redirect()->action('PreservativeAdminController@index');
    }
}
