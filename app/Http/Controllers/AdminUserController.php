<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.index', [
            'users' => $users,
            'totalUsers' => $users->count(),
            'totalFarmers' => $users->where('usertype', 'farmer')->count(),
            'totalBuyers' => $users->where('usertype', 'user')->count(),
            'totalProducts' => Product::count(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'usertype' => 'required|in:admin,farmer,user'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype
        ]);

        return redirect()->route('admin.index')->with('success', 'User added successfully.');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.index')->with('success', 'User deleted.');
    }
}
