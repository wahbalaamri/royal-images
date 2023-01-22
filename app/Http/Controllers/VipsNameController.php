<?php

namespace App\Http\Controllers;

use App\Models\VipsName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VipsNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'VIPs' => VipsName::all()
        ];
        return view('system.images.vips.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.images.vips.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NewVip = new VipsName();
        $NewVip->name_ar = $request->name_ar;
        $NewVip->name_en = $request->name_en;
        $NewVip->save();
        return redirect('/vipsNames');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VipsName  $vipsName
     * @return \Illuminate\Http\Response
     */
    public function show(VipsName $vipsName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VipsName  $vipsName
     * @return \Illuminate\Http\Response
     */
    public function edit(VipsName $vipsName)
    {
        $data = [
            'vip' => $vipsName
        ];
        return view('system.images.vips.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VipsName  $vipsName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VipsName $vipsName)
    {
        $vipsName->name_ar = $request->name_ar;
        $vipsName->name_en = $request->name_en;
        $vipsName->save();
        return redirect('/vipsNames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VipsName  $vipsName
     * @return \Illuminate\Http\Response
     */
    public function destroy(VipsName $vipsName)
    {
        VipsName::destroy($vipsName->id);
        return redirect('/vipsNames');
        //
    }
}
