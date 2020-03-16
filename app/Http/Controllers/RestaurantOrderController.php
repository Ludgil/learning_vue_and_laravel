<?php

namespace App\Http\Controllers;

use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantOrderController extends Controller
{
    public function index($id)
    {
        $resto = Restaurant::find($id);

        if(!$resto){
            abort(404, 'The restaurant you are looking for is not present');
        }

        $orders = Order::where('resto_id', $id)
        ->orderBy('isComplete')
        ->paginate(5);

        return view('orders.index', compact('resto', 'orders'));
    }

    public function add($id)
    {
        $resto = Restaurant::findOrFail($id);
        return view('orders.add')
                    ->with('resto',$resto);
    }

    public function store(Request $resquest)
    {
        // logger($resquest->all()); envoie la requete dans un fichier log
        return $resquest->all();
    }
}
