<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Shop::latest()->get();
        return response()->json([
            'message' => 'show all data',
            'data' => ShopResource::collection($shop)
        ]);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $shop = Shop::create([
            'name' => $request->name
        ]);
        
        return response()->json([
            'message' => 'data created successfully',
            'data' => new ShopResource($shop)
            ]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        if (is_null($shop)) {
            return response()->json([
                'message' => 'data not found'
            ]);
        }
        return response()->json([
            'message' => 'data found',
            'data' => new ShopResource($shop)
        ]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $shop->name = $request->name;
        $shop->save();

        return response()->json([
            'message' => 'data updated successfully',
            'data' => new ShopResource($shop)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Shop::find($id)->delete();
            return response()->json([
                'message' => 'data deleted successfully'
            ]);
    }
}