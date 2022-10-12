<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function placeOrder(Request $request){

       //get order details 
       $firstName=$request->get('firstName');
       $lastName=$request->get('lastName');
       $phone=$request->get('phone');
       $email=$request->get('email');
       $city=$request->get('city');
       $address=$request->get('address');
       $total=$request->get('total');
       $orders=$request->get('orders');
       /*$ordersArray=[];
       foreach($orders as $order){

       }*/
       
       //save order details
       $order=Order::create([
        'customerID'=> auth()->user()->id,
        'firstName' => $firstName,
        'lastName'  => $lastName,
        'phone'    => $phone,
        'email'   => $email,
        'city' => $city,
        'address' => $address,
        'total' => $total,
        'orderDetails'=> json_encode($orders)
       ]);

       //clear the user cart after place order(and payment success in real cases)
       if($order){
        Cart::where('user_id',auth()->user()->id)->delete();
        return ['success' => 'Order completed successfully'];
       }else{
        return ['error' => 'Order failed, contact support'];
       }

       
    }
    public function myOrders(){

        return view('pages.orders');
    }
    public function getOrderItems(){
        $orderItems=Order::where('customerID',auth()->user()->id)->get();
        return response()->json($orderItems);
    }

}
