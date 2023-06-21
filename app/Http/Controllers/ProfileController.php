<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Order};
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
{
    $data = User::find($id);
    $pageTitle = 'Profile';

    return view('dashboard.profile', [
        'data' => $data,
        'pageTitle' => $pageTitle
    ]);
}

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function home(){
        if (Auth::check()) {
            return view('dashboard.home');
        } else {
            return redirect()->route('user.register');
        }
    }
    
    
    
    
    
    public function orders(){
        if (Auth::check()) {
            $id = Auth::user();
            $data = Order::whereIn('user_id',$id)->get();
            return view('dashboard.orders')->with(compact('data'));
        } else {
            return redirect()->route('user.register');
        }
    }
}
