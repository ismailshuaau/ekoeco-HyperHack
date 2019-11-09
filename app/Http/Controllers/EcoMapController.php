<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcoMapController extends Controller
{
    //
    public function show(Request $request)
    {
        dd($request->all());

        return view('echoMap.show');
    }
}
