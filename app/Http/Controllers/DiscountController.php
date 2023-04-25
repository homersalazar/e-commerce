<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $discount = Discount::get();
        $discount = DB::table('discounts')
            ->leftJoin('categories', 'discounts.category_id', '=', 'categories.id')
            ->leftJoin('products', 'discounts.product_id', '=', 'products.id')
            ->get();
        return view('discounts.index',['discount' => $discount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctgy = category::all();
        $prod = Product::all();
        return view('discounts.create',[
            'ctgy'=>$ctgy,
            'prod'=>$prod,
        ]);
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
            'codes' => 'required',
            'discount_types' => 'required',
            'discount_val' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $discount = new Discount();
        $discount->codes = $request->codes;
        $discount->category_id = $request->ctgy_id;
        $discount->product_id = $request->prod_id;
        $discount->discount_types = $request->discount_types;
        $discount->discount_val = $request->discount_val;
        $discount->start_dates = $request->start_date;
        $discount->end_dates = $request->end_date;
        $discount->save();
        return redirect()
        ->route('discount.index')
        ->with('success',''.ucwords($request->codes).' has been created successfully.');
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
        $discount = Discount::find($id);
        $ctgy = category::all();
        $prod = Product::all();
        return view('discounts.edit',[
            'discount' => $discount,
            'ctgy' => $ctgy,
            'prod' => $prod
        ]);
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
            'codes' => 'required',
            'discount_types' => 'required',
            'discount_val' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $discount = Discount::find($id);
        $discount->codes = $request->codes;
        $discount->category_id = $request->ctgy_id;
        $discount->product_id = $request->prod_id;
        $discount->discount_types = $request->discount_types;
        $discount->discount_val = $request->discount_val;
        $discount->start_dates = $request->start_date;
        $discount->end_dates = $request->end_date;
        $discount->save();
        return redirect()
        ->route('discount.index')
        ->with('success',''.ucwords($request->codes).' has been updated successfully.');
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
