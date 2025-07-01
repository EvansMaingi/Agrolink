<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
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
        $inquiry->user_id = Auth::check() ? Auth::id() : null; // optional if guest
        $inquiry->message = $request->message;
        $inquiry->save();

        return back()->with('success', 'Inquiry sent successfully!');
    }

    public function inbox()
{
    $farmerId = auth()->id(); // The logged-in farmer

    // Get all inquiries for products owned by this farmer
    $inquiries = Inquiry::whereHas('product', function ($query) use ($farmerId) {
        $query->where('farmer_id', $farmerId);
    })->with('product', 'user')->latest()->get();

    return view('farmer.index', compact('inquiries'));
}


public function index()
{
    $categories = Category::where('farmer_id', auth()->id())->get();

    $inquiries = Inquiry::whereHas('product', function ($q) {
        $q->where('farmer_id', auth()->id());
    })->with(['product', 'user'])->get();

    return view('farmer.index', compact('categories', 'inquiries'));
}


   
}
