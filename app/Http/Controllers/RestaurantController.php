<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;
use App\Services\RestoService;

class RestaurantController extends Controller
{

    public function index(RestoService $restoService)
    {
        $restos = $restoService->userRestoAndTables();
       return view('resto.index', compact('restos'));
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'name' => "required|min:3",
            'location' => "required|min:3",
            'tables' => "required|integer",
        ]);



            auth::user()->restaurants()->create($postData);


        return response()->json($postData, 201);
    }
}
