<?php

namespace App\Http\Controllers;

use App\Models\VipTitles;
use App\Http\Requests\StoreVipTitlesRequest;
use App\Http\Requests\UpdateVipTitlesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VipTitlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_approved_vipTitles=VipTitles::all();
        $_unapproved_vip_titles = VipTitles::all();
        $data=[
            'vip_titles'=>$_approved_vipTitles,
            'unapproved_vip_titles'=>$_unapproved_vip_titles,
        ];
        return view('vip_titles.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vip_titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vip_title=new VipTitles();

        $vip_title->ar_vip_title=$request->ar_vip_title;
        $vip_title->en_vip_title=$request->en_vip_title;
        $vip_title->save();

        return redirect('/vipTitles')->with('success','تم إضافة صفة إعتبارية جديدة في إنتظار إعتمادها من قبل المختصين');
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
        $vip_title=VipTitles::find($id);
        return view('vip_titles.edit')->with('Vip_title',$vip_title);
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
        $_ar_vip_title=$request->input('ar_vip_title');
        $_en_vip_title=$request->input('en_vip_title');
        $vip_title= VipTitles::find($id);
        $vip_title->ar_vip_title=$_ar_vip_title;
        $vip_title->en_vip_title=$_en_vip_title;
        $vip_title->save();
        return redirect('/vipTitles')->with('success','تم تعديل بيانات الصفة إعتبارية في إنتظار إعتمادها من قبل المختصين');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destroy
        $vip_title=VipTitles::find($id);
        $vip_title->delete();
        return redirect('/vipTitles')->with('success','تم حذف الصفة إعتبارية في إنتظار إعتمادها من قبل المختصين');
    }
}
