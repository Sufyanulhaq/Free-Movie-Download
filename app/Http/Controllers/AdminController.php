<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Content;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContentRequest;
use App\Repositories\FileRepository;
class AdminController extends Controller
{
    public function adminLogin(){
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, check role ID
            $user = Auth::user();
            if ($user->role_id == 2) {
                return redirect()->route('index')
                ->with('success','Successfully Logged In');
            }
        }

        // Authentication failed or role ID is not 2
        return back()->withErrors(['credentials'=>'Invalid credentials']);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.register');
    }
    public function userDetails(){
        $data = User::get();
        return view('admin.user')->with(compact('data'));
    }
    public function adminContent(ContentRequest $request, FileRepository $fileRep){
        $data = $request->only('title','piece','format','recommendation','description','price','category_id');
        $upload = Content::create($data);
        if($request->file){
            $images = $fileRep->create([$request->file],'contents', $upload->id);
        }
        $upload->save();
        if($upload==true){
            return back()->with('success','Content Uploaded Successfully');
        }
        else{
            return back()->with('success','Content Did not Uploaded Successfully');
        }
    }
    public function userEdit($id){
        $data = User::find($id);
        return view('admin.edit',['data'=>$data]);
    }
    public function userEditForm(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        // Check if role_id is provided in the request
        if ($request->role_id) {
            $user->role_id = $request->input('role_id');
        } else {
            $user->role_id = 1; // Set default value to 1
        }
        $user->save();
        return back()->with('success', 'Updated Successfully');
    }
    
    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User Deleted Successfully.');
    }
}
