<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pizza;
use App\Models\Cart;
class CartsController extends Controller
{
    public function store(Request $request){
        if(!$request->get('pizza_id')){
            return ['message'=>'Cart items retuned',
            //check user cart items
             //'items'  => Cart::where('user_id',auth()->user()->id)->get()
             'items'  => Cart::where('user_id',auth()->user()->id)->sum('quantity')
                ];  
        }
        $pizza= Pizza::where('id',$request->get('pizza_id'))->first();
        
        //check if pizza is already in cart if not add it else increment quantity
        $pizzaAlreadyInCart=Cart::where('pizza_id',$request->get('pizza_id'))->pluck('id');
        if($pizzaAlreadyInCart->isEmpty()){

            //reduce the price of pizza of the day by 33%
            if($pizza->pizza_of_the_day===1)
            {
                $price=number_format((float)($pizza->price)-($pizza->price*0.33), 2, '.', ''); 
            }else{ 
                $price=$pizza->price;
            }

            $cart= Cart::create([
                'pizza_id' =>$pizza->id,
                'quantity'=> 1,
                'price'  =>$price,
                'user_id'=>auth()->user()->id,
               ] );
           
        }else{
            $cart=Cart::where('pizza_id',$request->get('pizza_id'))->increment('quantity');
        }
        if($cart){
            return ['message'=>'Cart Updated',
                  //check user cart items
                   //'items'  => Cart::where('user_id',$auth()->user()->id)->get()
                   'items'  => Cart::where('user_id',auth()->user()->id)->sum('quantity')
        ];
        }
        
    }
    public function index(){
        return view('pages.checkout');
    }
    public function getCartItems(){
        $finalData=[];
        if (Auth::check()) {
            // The user is logged in...
        $cartItems=Cart::with('pizza')->where('user_id',auth()->user()->id)->get();
        if(isset($cartItems)){
            foreach($cartItems as $cartItem){
             if($cartItem->pizza){
                $finalData[$cartItem->id]['pizza']=$cartItem->pizza;
                $finalData[$cartItem->id]['extras']=DB::table('pizza_has_extra')
                ->where('pizza_id',$cartItem->pizza_id)
                ->leftJoin('extras', 'extras.id', '=', 'pizza_has_extra.extra_id')
                ->select(
                    'extras.name as extraName', 'extras.price as extraPrice', 'extras.isChoosable as choosable')
                ->get();
                $finalData[$cartItem->id]['cartItem']=$cartItem;
             }
             

            }
        }
        }     
        //dd($finalData);
        return response()->json($finalData);
    }

    public function deletePizza($id){
        $res=Cart::where('pizza_id',$id)->delete();
        if($res){
            return ['success' => 'Pizza Deleted From Cart'];
           }else{
            return ['error' => 'Somthing Went Wrong'];
           }

    }
}
