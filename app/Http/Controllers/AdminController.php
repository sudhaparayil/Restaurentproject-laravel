<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

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

   
   public function foodMenu()
   {
      //$data = food::all();
    //  $data = Food::orderBy('id','desc')->get();
      $data = Food::orderBy('id','desc')->paginate(3);
       return view('admin.foodmenu',compact("data"));
   }


   public function uploadFood(Request $request)
   {

     //getClientOriginalExtension()
     //getClientOriginalName()
     //getClientMimeType()
     //gussExtension()
     //getMimeType()
     //store()
     //asStore()
     //storePublicly()
     //move()
     //getSize()
     //getError()
     //isValid()
     

   //   $test = $request->image->getClientOriginalExtension();
   //   dd($test);

     $request->validate([
        'title' => 'required',
        'price' => 'required|integer|min:0|max:500',
        'image' => 'required|mimes:jpeg,png,jpeg|max:5048',
        'description' => 'required',

     ]);

      $image = $request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('foodimage',$imagename);
     
      $data = new food;
      $data->title=$request->title;
      $data->price=$request->price;
      $data->image=$imagename;
      $data->description=$request->description;
      $data->save();




     if(!is_null($data)) {

         return back()->with("success", "Food menu successfully Added.");
     }

     else {
         return back()->with("failed", "Failed to Food menu.");
     }
      

     
   }

   public function deleteMenu($id)
   {

      $data = food::find($id);
     
      unlink("foodimage/".$data->image);

      food::where("id", $id)->delete();

      return back()->with("success", "Food Menu deleted successfully.");

   //  $data = food::find($id);
   //  $data->delete();
   //  return redirect()->back();
   }


   public function updateView($id)
   {
    $data = food::find($id);
    
    return view('admin.updateview',compact("data"));
   }
   
   public function updateFood(Request $request,$id)

   {

            $data = food::find($id);
            

            $request->validate([
               'title' => 'required',
               'price' => 'required|integer|min:0|max:500',
               'description' => 'required',
           ]);


           $file = $request->image;

           if($file !== null)
           {

            $request->validate([
               'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
               ]);
               $data = food::find($id);
               unlink("foodimage/".$data->image);
  
               $imagename = time().'.'.$file->getClientOriginalExtension();
               $request->image->move('foodimage',$imagename);
               $data->image=$imagename;

              
            }else {

               $data->image=$data->image;
            }


            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->save();

            return back()->with("success", "Food Menu updated successfully.");
            //return redirect()->back();
   }
   

}
