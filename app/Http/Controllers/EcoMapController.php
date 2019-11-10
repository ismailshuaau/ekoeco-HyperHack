<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcoMapController extends Controller
{
    //
    public function show(Request $request)
    {
        // dd($request->all());

        // Get Origin cordinates
        $searchLatOrigin = $request->searchLatOrigin;
        $searchLngOrigin = $request->searchLngOrigin;

        // Get Destination cordinates
        $searchLatDest = $request->searchLatDest;
        $searchLngDest = $request->searchLngDest;
        
        // Combine cordinates
        $originGeo = $searchLatOrigin . ', ' . $searchLngOrigin;
        $destGeo = $searchLatDest . ', ' . $searchLngDest;
        
        // Get Origin name
        // dd($request->origin);
        $originName = $request->origin;
        $destName = $request->destination;

        // Get mode of transport
        $travelMode = $request->travelMode;

        // dd($travelMode);

        // Get Destination name
        return view('echoMap.show', compact('originGeo', 'destGeo', 'originName', 'destName', 'travelMode'));
    }
}
