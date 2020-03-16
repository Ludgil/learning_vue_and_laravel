<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Order;
use Exception;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        ->orderByDesc('created_at')
        ->paginate(5);

        return view('orders.index', compact('resto', 'orders'));
    }

    public function add($id)
    {
        $resto = Restaurant::findOrFail($id);
        return view('orders.add')
                    ->with('resto',$resto);
    }

    public function store(Request $request)
    {
        // logger($resquest->all()); envoie la requete dans un fichier log

        $postData = $this->validate($request, [
            'resto_id' => 'required|exists:restaurants,id',
            'order_data' => 'required|array'
        ]);

        $itemIds = $postData['order_data']['orderedItems'];
      
        $itemIds[] = 99;

        try{
            DB::beginTransaction();
            $orderTotal = 0;
            foreach($itemIds as $id){
                $menu = Menu::query()
                        ->where('resto_id', $postData['resto_id'])
                        ->where('id', $id)
                        ->first();

                if($menu){
                    $orderTotal += $menu->price;
                }

            }
            $order = Order::create([
                'resto_id' => $postData['resto_id'],
                'user_id' => Auth::user()->id,
                'amount' => $orderTotal,
                'isComplete' => 0,
                'order_details' => [
                    'items' => $postData['order_data']['orderedItems'],
                    'customer_name' => $postData['order_data']['customerDetails']['name'],
                    'customer_phone' =>$postData['order_data']['customerDetails']['phone'],
                    'customer_address' =>$postData['order_data']['customerDetails']['address']
                ]
            ]);

            logger($orderTotal);
            DB::commit();
        }catch(\Exception $e){
            logger($e->getMessage());
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }

    
        return response()->json($order, 201);
    }
}
