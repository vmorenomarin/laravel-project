<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dash(Request $request){
        $name=$request->input('name', default:"Valor default2");
        return view('welcome', ['name'=>$name]);
    }
}