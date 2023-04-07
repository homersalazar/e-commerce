<?php

namespace App\Http\Controllers;

use App\Models\TempData;
use Illuminate\Http\Request;

class TempDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'select_ids' => 'required'
        ]);

        $data = TempData::first();

        if ($data) {
            $mediaIds = explode(',', $data->media_id);
            $newMediaIds = explode(',', $request->select_ids);
            $mergedIds = array_merge($mediaIds, $newMediaIds);
            $uniqueIds = array_unique($mergedIds);
            $data->media_id = implode(',', $uniqueIds);
            $data->save();
        } else {
            $data = new TempData();
            $data->media_id = $request->select_ids;
            $data->save();
        }

        return redirect()
            ->route('product.create')
            ->with('success', 'Images have been added successfully.');

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
        $tempdata = TempData::first();
        if (!is_null($tempdata)) {
            $mediaIds = explode(',', $tempdata->media_id);
            $index = array_search($id, $mediaIds);
            if ($index !== false) {
                unset($mediaIds[$index]);
                $tempdata->media_id = implode(',', $mediaIds);
                $tempdata->save();
            }
        }
        return redirect()
        ->route('product.create')
        ->with('success', 'Images have been deleted successfully.');
    }
}
