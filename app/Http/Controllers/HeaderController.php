<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Content,Category,File};

class HeaderController extends Controller
{
    public function gmail(){
        $data = Content::where('category_id',1)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'Gmail';
        return view('headers.gmail',compact('pageTitle') , ['data'=>$data]);
        
    
    }
    public function aged(){
        $data = Content::where('category_id',2)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'Aged Gmail';
        
        return view('headers.aged',['data'=>$data], compact('pageTitle'));
    }public function newgmail(){
        $data = Content::where('category_id',3)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'New Gmail';
        return view('headers.newgmail',['data'=>$data],compact('pageTitle'));
    }public function linkedin(){
        $data = Content::where('category_id',4)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'linkedin';
        return view('headers.linkedin',['data'=>$data],compact('pageTitle'));
    }public function social(){
        $data = Content::where('category_id',5)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'Social';
        return view('headers.social',['data'=>$data],compact('pageTitle'));
    }public function otheremail(){
        $data = Content::where('category_id',6)->orderBy('id','desc')->with('image')->get();
        $pageTitle = 'Other Mail';
        return view('headers.otheremail',['data'=>$data], compact('pageTitle'));
    }
}
