<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    function changeLang($langcode){
        App::setLocale($langcode);
        session()->put("lang_code",$langcode);
        //dd(session()->get("lang_code"));
        return redirect()->back();
    }  
}
