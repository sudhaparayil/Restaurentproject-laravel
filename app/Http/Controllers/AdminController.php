<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
   public function allUser()
   {
      // $data = user::all();
       $data = user::paginate(6);
       //$data = user::where('usertype','0')->get();
      // return $data
       return view('admin.users',['users'=> $data]);
   }

   public function deleteUser($id)
   {
    $data = user::find($id);
    $data->delete();
    return redirect()->back();
   }
}
