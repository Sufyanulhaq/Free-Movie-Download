<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\{User,Category};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
   public function index()
{
    $pageTitle = 'Admin';
    
    if (!auth()->check()) {
        return view('admin.login')->with('pageTitle', $pageTitle);
    }

    $category = Category::get();
    // dd($category);
    return view('admin.index')->with(compact('category', 'pageTitle'));
}

    public function form(){
        return view('dashboard.login');
    }
    public function registerForm(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => 1
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session();
            return redirect()->route('user.home')->with('success', 'Account created successfully!');
        }
        return redirect()->route('user.register');
}
        public function loginForm(Request $request){
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            $credentials['role_id'] = 1;
            if (Auth::attempt($credentials,true)) {
                $request->session()->regenerate();
                $request->session()->flash('success', 'Logged In successfully!');
                return redirect()->route('user.home');
            }
            return back()->withErrors([
                'credentials' => 'The provided credentials do not match our records.',
            ]);
        }
}

