<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Auth;
use App\Models\Order;
use App\Models\Pizza;

class BackendController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOrdersItems()
    {
        $ordersItems=Order::all();
        return response()->json($ordersItems);
    }


    public function getPizzasItems()
    {
        $pizzasItems=Pizza::all();
        return response()->json($pizzasItems);
    }



    public function adminView()
    {
        return view('backend.admin-view');
    }
    public function updateOrderStatus($id,Request $request){
        $res=Order::where('id',$id)->update(['status'=> $request->get('status')]);;
        if($res){
            return ['success' => 'Order Status Updated'];
           }else{
            return ['error' => 'Somthing Went Wrong'];
           }
    }
    public function updatePizzaOfTheDay($id,Request $request){
        $res=Pizza::where('id',$id)->update(['pizza_of_the_day'=> $request->get('pizza_of_the_day')]);;
        if($res){
            return ['success' => 'Pizza Of The Day Updated'];
           }else{
            return ['error' => 'Somthing Went Wrong'];
           }
    }
    public function deleteOrder($id){
        $res=Order::where('id',$id)->delete();
        if($res){
            return ['success' => 'Order Deleted From The Database'];
           }else{
            return ['error' => 'Somthing Went Wrong'];
           }

    }
}
