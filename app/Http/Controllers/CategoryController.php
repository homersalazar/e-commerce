<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ctgy = category::all();
        return view('categories.index',['ctgy'=>$ctgy ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'ctgy_name' => 'required'
        ]);

        $ctgy = new Category();
        $ctgy->category_name = ucwords($request->ctgy_name);

        $ctgy->save();

        return redirect()
        ->route('category.index')
        ->with('success',''.ucwords($request->ctgy_name).' has been created successfully.');
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
        $ctgy = category::find($id);
        return view('categories.edit',['ctgy' => $ctgy]);
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
        $this->validate($request,[
            'ctgy_name' => 'required'
        ]);

        $ctgy = category::find($id);

        $ctgy->category_name = ucwords($request->ctgy_name);

        $ctgy->save();
        return redirect()
        ->route('category.index')
        ->with('success',''.ucwords($request->ctgy_name).' has been updated successfully.');
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
    }
}
