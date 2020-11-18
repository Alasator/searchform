<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use Illuminate\Http\Request;

class HousesController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {

        $houses = (new Houses)->newQuery();

        if ($request->has('name') && !is_null($request->input('name')))
            $houses->where('name', 'like', '%' . $request->input('name') . '%');

        if ($request->has('price_from') && $request->has('price_to'))
            $houses->whereBetween('price', [$request->input('price_from'), $request->input('price_to')]);

        if ($request->has('bedrooms') && !is_null($request->input('bedrooms')))
            $houses->where('bedrooms', $request->input('bedrooms'));

        if ($request->has('bathrooms') && !is_null($request->input('bathrooms')))
            $houses->where('bathrooms', $request->input('bathrooms'));

        if ($request->has('storeys') && !is_null($request->input('storeys')))
            $houses->where('storeys', $request->input('storeys'));

        if ($request->has('garages') && !is_null($request->input('garages')))
            $houses->where('garages', $request->input('garages'));

        return response()->json([
            'data' => $houses->get()->collect()
        ]);
    }

}
