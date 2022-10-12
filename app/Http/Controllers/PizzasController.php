<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzasController extends Controller
{
    public function index(){
        $pizzas= Pizza::all();
        //dd($pizzas);
        return view('Pizzas',compact('pizzas'));
    }
    
}
