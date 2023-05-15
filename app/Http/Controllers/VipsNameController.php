<?php

namespace App\Http\Controllers;

use App\Models\Nationalities;
use App\Models\VipGroups;
use App\Models\VipsName;
use App\Models\VipTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $data = [
            'VIPnationalities' => Nationalities::all(),
            'VIPtitles' => VipTitles::all(),
            'VIPgroups' => VipGroups::all()

        ];
        return view('system.images.vips.add')->with($data);
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
        $NewVip->vip_title = $request->vip_title;
        $NewVip->vip_group = $request->vip_group;
        $NewVip->nationality = $request->nationality;
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
            'vip' => $vipsName,
            'VIPnationalities' => Nationalities::all(),
            'VIPtitles' => VipTitles::all(),
            'VIPgroups' => VipGroups::all()
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
        $vipsName->vip_title = $request->vip_title;
        $vipsName->vip_group = $request->vip_group;
        $vipsName->nationality = $request->nationality;
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
    public function getVipNames(Request $request)
    {

        $vips = VipsName::where([
            ['nationality','=', $request->nationality],
            ['vip_title','=', $request->vip_title],
            ['vip_group','=', $request->vip_group]
        ])->get();
        return response()->json($vips);
    }
}
