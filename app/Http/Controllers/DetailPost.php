<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class DetailPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function show($id)
    {
        //
        $data = Post::where('id',$id)->with('categoryDetails')->get();
        //dd($data->title);
        return view('user.detailspost',compact('data'));
    }
}