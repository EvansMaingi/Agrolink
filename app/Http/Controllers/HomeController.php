<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

use App\Models\Star; // Assuming you have a Star model for the stars table

use illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    

    public function home()
    {

        $products = Product::all();


        if(Auth::id())
        {
            $user = Auth::user();
         
         $user_id = $user->id;

$count = Star::where('user_id', $user_id)->count();

        
        }

        

        else
        {
            $count = '';
        }

        

        return view('home.index',compact('products', 'count'));
    }


    public function login_home()
    {
         $products = Product::all();

         
        if(Auth::id())
        {
            $user = Auth::user();
         
         $user_id = $user->id;

$count = Star::where('user_id', $user_id)->count();

        
        }

        

        else
        {
            $count = '';
        }
        

        return view('home.index',compact('products', 'count'));


}

public function product_details($id)
{


    $data = Product::find($id);


    
        if(Auth::id())
        {
            $user = Auth::user();
         
         $user_id = $user->id;

$count = Star::where('user_id', $user_id)->count();

        
        }

        

        else
        {
            $count = '';
        }



    return view('home.product_details', compact('data', 'count'));
}

public function add_star($id)
{
$product_id = $id;

$user = Auth::user();

$user_id = $user->id;

$data = new Star();

$data->user_id = $user_id;

$data->product_id = $product_id;

$data->save();

toastr()->timeout (5000)->closeButton()->addSuccess('Product Stared successfully!'); 


return redirect()->back();






}

public function starred()
{

    if(Auth::id())
    {
        $user = Auth::user();
        $user_id = $user->id;
        $count = Star::where('user_id', $user_id)->count();

        $star = Star::where('user_id', $user_id)->get();
    }
    return view('home.starred',compact('count', 'star'));


}

public function destroy_star($id)
{
    $star = Star::find($id);
    if ($star) {
        $star->delete();
        toastr()->timeout (5000)->closeButton()->addSuccess('Product Unstared successfully!'); 
    } else {
        toastr()->timeout (5000)->closeButton()->addError('Star not found!');
    }
    
    return redirect()->back();


}
}