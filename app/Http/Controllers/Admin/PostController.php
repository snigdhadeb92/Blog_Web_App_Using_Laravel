<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Post::whereNull('deleted_at')->with('categoryDetails')->get();
        //dd($data);
        return view('post.addpost',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = \App\Models\Category::whereNull('deleted_at')->get();
        return view('post.create', compact('categories'));

    }
   
    protected function __formPost(Request $request, $id = '')
    {
      
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'desc' => 'required'            
        ]);
        
        $input1['title'] = $input['title'];
        $input1['cat_id'] = $input['cat_id'];
        //$input1['image'] = $input['image'];
        $input1['desc'] = $input['desc'];
        
        //dd($input);
        // $validationRules = [
        //     'name' => 'required',
        // ];
        // $validator = Validator::make($input, $validationRules);
        // if ($validator->fails()) {
            // return redirect()->back()
            //     // ->with('error', $validator->errors()->first())
            //     ->withInput();
        // } else {
            if ($id) {
                $data = \App\Models\Category::where('id', $id)->first();
                $data->update([
                    'name' => $request->name
                ]);
            } else {
                if($request->file('image')){
                    $file= $request->file('image');
                    //dd($file);
                    $filename= date('YmdHi').$file->getClientOriginalName();
                    //dd($filename);
                    $file-> move(public_path('/images'), $filename);
                    //dd(public_path());
                    $input1['image']= $filename;
                   
                }
                $data = \App\Models\Post::create($input1);
   
            }
            if ($data) {
                return redirect()
                    ->route('addposts.index')
                    ->with('success', 'Record has been successfully saved.');
            } else {
                return redirect()->back()->with('error', 'Not update');
            }
    }

    public function store(Request $request)
    {
        //
        
        return $this->__formPost($request);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \App\Models\Post::where('id', $id)->delete();
        return redirect()->back();
    }
    public function viewPosts()
    {
        //
        $data = Post::whereNull('deleted_at')->with('categoryDetails')->get();
        //dd($data);
        return view('user.viewpost',compact('data'));

    }
    // public function detailPosts()
    // {
    //     //
    //     $data = Post::whereNull('deleted_at')->with('categoryDetails')->get();
    //     //dd($data);
    //     return view('user.detailspost',compact('data'));

    // }
}
