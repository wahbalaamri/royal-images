<?php

namespace App\Http\Controllers;

use App\Models\ImageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ImageType::all();
        $data = [
            'types' => $types
        ];
        return view('system.images.types.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.images.types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_Image_type = new ImageType();
        $new_Image_type->type_ar = $request->type_ar;
        $new_Image_type->type_en = $request->type_en;
        $new_Image_type->save();
        return redirect('/imageTypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageType  $imageType
     * @return \Illuminate\Http\Response
     */
    public function show(ImageType $imageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageType  $imageType
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageType $imageType)
    {
        // dd('edit==>> '.$imageType);
        $data = [
            'type' => $imageType
        ];
        return view('system.images.types.edit')->with($data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageType  $imageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageType $imageType)
    {
        $imageType->type_ar = $request->type_ar;
        $imageType->type_en = $request->type_en;
        $imageType->save();
        return redirect('/imageTypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageType  $imageType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageType $imageType)
    {
        ImageType::destroy($imageType->id);
        return redirect('/imageTypes');
        // dd('destroy==>> ' . $imageType);
    }
}
