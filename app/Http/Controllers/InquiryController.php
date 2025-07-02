<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function send(Request $request, $productId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $inquiry = new Inquiry();
        $inquiry->product_id = $productId;
        $inquiry->user_id = Auth::id(); // Assumes user must be logged in
        $inquiry->message = $request->message;
        $inquiry->save();

        return back()->with('success', 'Inquiry sent successfully!');
    }

    public function index()
    {
        $farmerId = auth()->id();

        // Fetch categories for the sidebar
        $categories = Category::all();


        // Fetch inquiries for this farmer's products
        $inquiries = Inquiry::whereHas('product', function ($query) use ($farmerId) {
            $query->where('farmer_id', $farmerId);
        })->with(['product', 'user'])->latest()->get();

        return view('farmer.index', compact('categories', 'inquiries'));
    }


  public function destroy($id)
{
    $inquiry = \App\Models\Inquiry::findOrFail($id);

    // Optional: Add check to ensure only the product owner (farmer) can delete
    if ($inquiry->product->farmer_id !== auth()->id()) {
        abort(403); // Forbidden
    }

    $inquiry->delete();

    return redirect()->back()->with('success', 'Inquiry deleted.');
}



}
