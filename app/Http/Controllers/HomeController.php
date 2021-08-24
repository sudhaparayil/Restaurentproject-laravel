<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;

class HomeController extends Controller
{
   public function index()
   {
      $data = food::all();
       return view("/home",compact("data"));
   }

   public function reDirect()
   {
       $usertype = Auth::user()->usertype;

       if ($usertype == '1') {
          return view('admin.adminhome');
       }else {
         $data = food::all();
         return view("/home",compact("data"));
       }

   }
}
