<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; // Ensure you import the Category model if needed

class FarmerController extends Controller
{
   public function index()
    {
        $categories = Category::all();
        return view('farmer.index', compact('categories')); // Make sure this view exists: resources/views/farmer/index.blade.php
    }

    public function view_category()
    {
        $category = Category::all(); // Fetch all categories from the database
        return view('farmer.category'); // Make sure this view exists: resources/views/farmer/view_category.blade.php


    }

    public function add_category(Request $request ){

        $category = new Category();
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeout (5000)->closeButton()->addSuccess('Category added successfully!'); // Using Toastr for success message, ensure you have Toastr set up in your project


        return redirect()->back(); // Redirect back with a success message

    }

    public function delete_category($id)
    {
        $category =Category::find($id);
        $category->delete();

         toastr()->timeout (5000)->closeButton()->addSuccess('Category deleted successfully!'); // Using Toastr for success message, ensure you have Toastr set up in your project



        return redirect()->back();
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('farmer.edit_category',compact ('category')); // Make sure this view exists: resources/views/farmer/edit_category.blade.php);
    }

    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();

        toastr()->timeout (5000)->closeButton()->addSuccess('Category updated successfully!'); 

        return redirect ('/farmer/dashboard'); 

    }

    public function add_product()
    {
        $category= Category::all();
        return view('farmer.add_product',compact('category')); // Make sure this view exists: resources/views/farmer/add_product.blade.php
    }

    public function upload_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->title_deed = $request->title_deed;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->contacts = $request->contacts;
        $product->location = $request->location; // Add location field
        $product->email = $request->email; // Add email field

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;// Store the path to the image
        }

        if ($request->hasFile('title_deed')) {
            $file = $request->file('title_deed');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('title_deeds'), $filename);
            $product->title_deed = $filename; // Store the path to the title deed
        }

        toastr()->timeout (5000)->closeButton()->addSuccess('Product added successfully!'); 

        $product->save();

        return redirect()->back(); // Redirect back with a success message
    }

    public function view_product()
    {
        $product= Product::paginate(4); // Fetch all products from the database
       return view('farmer.view_product', compact('product')); // Make sure this view exists: resources/views/farmer/view_product.blade.php
    }


    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('images/' . $product->image);
        

        if (file_exists($image_path)) {
            unlink($image_path); 
            
              
           
        }


        $title_deed_path = public_path('title_deeds/' . $product->title_deed);
        if (file_exists($title_deed_path)) {
            unlink($title_deed_path); // Delete the title deed file
        }


        if ($product) {
            $product->delete();
            toastr()->timeout (5000)->closeButton()->addSuccess('Product deleted successfully!'); // Using Toastr for success message, ensure you have Toastr set up in your project
        } else {
            toastr()->timeout (5000)->closeButton()->addError('Product not found!'); // Using Toastr for error message
        }

        return redirect()->back(); // Redirect back with a success message
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('farmer.update_page', compact('product', 'category')); // Make sure this view exists: resources/views/farmer/update_product.blade.php
    }


    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->contacts = $request->contacts;
        $product->location = $request->location; // Add location field
        $product->email = $request->email; // Add email field

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $product->image = $filename; // Store the path to the image
        }

        if ($request->hasFile('title_deed')) {
            $file = $request->file('title_deed');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('title_deeds'), $filename);
            $product->title_deed = $filename; // Store the path to the title deed
        }

        toastr()->timeout (5000)->closeButton()->addSuccess('Product updated successfully!'); 

        $product->save();

        return redirect('/view_product'); // Redirect back with a success message
    }

    public function product_search(Request $request)
    {
        $search = $request->input('search');
        $product = Product::where('title', 'like', '%' . $search . '%')->orWhere('category','like','%'.$search.'%')->paginate(3);// Search for products by title
        return view('farmer.view_product', compact('product')); // Make sure this view exists: resources/views/farmer/view_product.blade.php
    } 

}