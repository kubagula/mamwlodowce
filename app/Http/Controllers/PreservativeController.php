<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preservative;

class PreservativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preservatives = Preservative::all();

        // dd($preservatives);        
        return view('preservatives', ['preservatives' => $preservatives]);
    }
}
