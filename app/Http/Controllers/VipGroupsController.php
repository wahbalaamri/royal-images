<?php

namespace App\Http\Controllers;

use App\Models\VipGroups;
use App\Http\Requests\StoreVipGroupsRequest;
use App\Http\Requests\UpdateVipGroupsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VipGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approved_vipGroups = VipGroups::all();
        $unaproved_vipGroups = VipGroups::all();
        $data = [
            'approved_vipGroups' => $approved_vipGroups,
            'unaproved_vipGroups' => $unaproved_vipGroups,

        ];
        return view('vip_groups.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('vip_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $_ar_vip_group = $request->input('ar_vip_group');
        $_en_vip_group = $request->input('en_vip_group');

        $vip_group = new VipGroups();
        $vip_group->ar_vip_group = $_ar_vip_group;
        $vip_group->en_vip_group = $_en_vip_group;
        $vip_group->save();

        return redirect('/vipGroups')->with('success', 'تم إضافة مجموعة جديدة لكبار الشخصيات في إنتظار إعتمادها من قبل المختصين');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vip_group = DB::table('vip_groups')->where('id','=',$id)->get()->first();

        $data = [
            'vip_group'=> $vip_group,


        ];

        return view('vip_groups.edit')->with($data);
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
        $_ar_vip_group = $request->input('ar_vip_group');
        $_en_vip_group = $request->input('en_vip_group');

        $vip_group =  VipGroups::find($id);
        $vip_group->ar_vip_group = $_ar_vip_group;
        $vip_group->en_vip_group = $_en_vip_group;
        $vip_group->save();
        return redirect('/vipGroups')->with('success', 'تم تعديل بيانات مجموعة كبار الشخصيات بنجاح في إنتظار إعتمادها من قبل المختصين');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vip_group = VipGroups::find($id);
        $vip_group->delete();
        return redirect('/vipGroups')->with('success', 'تم حذف المجموعة بنجاح في إنتظار إعتماد علمية الحذف من قبل المختصين');
    }
}
