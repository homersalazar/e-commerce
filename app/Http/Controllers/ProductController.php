<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\category;
use App\Models\Product;
use App\Models\TempData;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $product = Product::first();
        if (!is_null($product)) {
            $mediaIds = explode(',', $product->media_id);
            $media = Media::whereIn('id', $mediaIds)->get();
            if ($media->isEmpty()) {
                $media = null;
            }
        } else {
            $media = null;
        }

        return view('products.index', compact('product', 'media', 'products'));
        // return view('products.index',[
        //     'product'=>$product
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tempdata = TempData::first();
        if (!is_null($tempdata)) {
            $mediaIds = explode(',', $tempdata->media_id);
            $media = Media::whereIn('id', $mediaIds)->get();
        } else {
            $media = [];
        }
        $ctgy = Category::get();
        $images = Media::get();

        // $tempdata = TempData::get();

            return view('products.create',[
                'ctgy' => $ctgy,
                'images' => $images,
                'media'=>$media
            ],
        );
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
            'product_name' => 'required',
            'product_price' => 'required',
            'product_qty' => 'required'
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->descript = $request->product_desc;
        $product->url_slug = $request->product_url;
        $product->product_price = $request->product_price;
        $product->rrp = $request->product_rrp;
        $product->product_quantity = $request->product_qty;
        $product->category_id = $request->product_ctgy;
        $product->product_weight = $request->product_weight;
        $product->stats = $request->product_stats;
        $product->media_id = $request->media_id;
        $product->save();
        TempData::truncate();
        return redirect()
        ->route('product.index')
        ->with('success',''.ucwords($request->product_name).' has been created successfully.');
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
    }
}
