<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Category::whereNull('deleted_at')->get();
        return view('category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function __formPost(Request $request, $id = '')
    {
      
        $input = $request->all();
        $request->validate([
            'name' => 'required',
            
        ]);
        $input1['name'] = $input['name'];
        
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
                $data = \App\Models\Category::create($input1);
                
            }
            if ($data) {
                return redirect()
                    ->route('categories.index')
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
        $data = \App\Models\Category::where('id', $id)->first();
        //dd($data);
        return view('category.create',compact('data'));

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
        return $this->__formPost($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\Category::where('id', $id)->delete();
        return redirect()->back();
    }    
}
