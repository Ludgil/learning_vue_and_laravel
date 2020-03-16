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

        $orders = Order::where('resto_id', $id)->paginate(5);

        return view('orders.index', compact('resto', 'orders'));
    }
}
