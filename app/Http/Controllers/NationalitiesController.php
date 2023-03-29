<?php

namespace App\Http\Controllers;

use App\Models\Nationalities;
use App\Http\Requests\StoreNationalitiesRequest;
use App\Http\Requests\UpdateNationalitiesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NationalitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities= Nationalities::all();
        $_unapproved_nationalities = Nationalities::all();

        $data=[
            'nationalities'=>$nationalities,
            'unapproved_nationalities'=>$_unapproved_nationalities,

        ];
        return view('nationalities.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationalities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $_ar_nationality=$request->input('ar_nationality');
        $_en_nationality=$request->input('en_nationality');
        $nationality=new Nationalities;
        $nationality->ar_nationality=$_ar_nationality;
        $nationality->en_nationality=$_en_nationality;
        $nationality->save();
        return redirect('/nationalities')->with('success','تم إضافة جنسية جديدة بنجاح في إنتظار إعتمادهامن قبل المختصين');
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
        $nationality=Nationalities::find($id);
        return view('nationalities.edit')->with('nationality',$nationality);
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
        $_ar_nationality=$request->input('ar_nationality');
        $_en_nationality=$request->input('en_nationality');
        $nationality= Nationalities::find($id);
        $nationality->ar_nationality=$_ar_nationality;
        $nationality->en_nationality=$_en_nationality;
        $nationality->save();
        return redirect('/nationalities')->with('success','تم تعديل بيانات الجنسية بنجاح في إنتظار إعتمادها من قبل المختصين');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationality= Nationalities::find($id);
        $nationality->delete();

        return redirect('/nationalities')->with('success','تم حذف الجنسية بنجاح في إنتظار إعتمادها من قبل المختصين');
    }
}
