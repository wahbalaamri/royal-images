<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\ImageType;
use App\Models\VipsInImages;
use App\Models\VipsName;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = images::all();
        $VIPs = VipsName::all();
        $types = ImageType::all();
        $data = [
            'images' => $images,
            'VIPs' => $VIPs,
            'types' => $types,
            'VIpsImage' => VipsInImages::all()
        ];
        return view('system.images.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $VIPs = VipsName::all();
        $types = ImageType::all();
        $data = [
            'VIPs' => $VIPs,
            'types' => $types
        ];
        return view('system.images.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $VIPs = $request->vips;
            $imageName = $request->file('image')->getClientOriginalName();
            $date = $request->image_date;
            $year = date('Y', strtotime($date));
            $month = date('m', strtotime($date));

            $image_occasion = $request->image_occasion;
            $image_location = $request->image_location;
            $imageFullName = $date . '-' . $image_occasion . '-' . $image_location . '-' . $imageName;
            $extension = $request->file('image')->extension();
            $request->image->move(public_path('uploaded_images'), $imageFullName);

            $new_image = new images();
            $new_image->image_date = $date;
            $new_image->image_occasion = $image_occasion;
            $new_image->image_location = $image_location;
            $new_image->image_url = $imageFullName;
            $new_image->image_file_type = $extension;
            $new_image->image_color_mode = $request->image_color_type;
            $new_image->image_quality = $request->image_quality;
            $new_image->image_type = $request->image_type;
            $new_image->image_year = $year;
            $new_image->image_month = $month;
            $new_image->save();

            foreach ($VIPs as $vip) {
                $new_vip_in_image = new VipsInImages();
                $new_vip_in_image->image_id = $new_image->id;
                $new_vip_in_image->vip_id = intval($vip);
                $new_vip_in_image->save();
            }
            return redirect('images');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $VIPs = VipsName::all();
        $types = ImageType::all();
        $data = [
            'VIPs' => $VIPs,
            'types' => $types,
            'image' => images::find($id)
        ];
        return view('system.images.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $VIPs = $request->vips;
        // $string = "";
        $image_to_update = images::find($id);



        $date = $request->image_date;
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        $image_occasion = $request->image_occasion;
        $image_location = $request->image_location;

        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $imageFullName = $date . '-' . $image_occasion . '-' . $image_location . '-' . $imageName;
            $image_to_update->image_url = $imageFullName;
            $extension = $request->file('image')->extension();
            $request->image->move(public_path('uploaded_images'), $imageFullName);
            $image_to_update->image_file_type = $extension;
        }
        $image_to_update->image_date = $date;
        $image_to_update->image_occasion = $image_occasion;
        $image_to_update->image_location = $image_location;
        $image_to_update->image_color_mode = $request->image_color_type;
        $image_to_update->image_quality = $request->image_quality;
        $image_to_update->image_type = $request->image_type;
        $image_to_update->image_year = $year;
        $image_to_update->image_month = $month;
        $image_to_update->save();
        $vipsInimageBD = $image_to_update->vipsInImages;
        // dd(count($VIPs) . " = " . count($vipsInimageBD));
        if (count($VIPs) == count($vipsInimageBD)) {
            for ($i = 0; $i < count($vipsInimageBD); $i++) {
                $updateVipsInImage = VipsInImages::find($vipsInimageBD[$i]->id);
                // dd($vipsInimageBD[$i]->id);
                $updateVipsInImage->vip_id = intval($VIPs[$i]);
                $updateVipsInImage->save();
            }
        } else {

            VipsInImages::where('image_id', $image_to_update->id)->delete();
            foreach ($VIPs as $vip) {
                $new_vip_in_image = new VipsInImages();
                $new_vip_in_image->image_id = $image_to_update->id;
                $new_vip_in_image->vip_id = intval($vip);
                $new_vip_in_image->save();
            }
            // $s = $image_to_update->vipsInImages;

        }
        return redirect('images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(images $images)
    {
        //
    }
    public function addVips(Request $request)
    {
        $data = [
            'vip' => $request->vip,
            'msg' => 'msg'
        ];
        return response()->json($data);
    }
    public function search()
    {

        $VIPs = VipsName::all();
        $types = ImageType::all();
        $data = [
            'VIPs' => $VIPs,
            'types' => $types
        ];
        return view('system.images.search')->with($data);
    }
    public function getReult(Request $request)
    {
        try {
            $q = DB::table('images');

            $images = images::all();

            if ($request->Occasion != null)
                $q = $q->where('image_occasion', 'LIKE', $request->Occasion . '%');
            if ($request->Location != null)
                $q = $q->where('image_location', 'LIKE', $request->Location . '%');
            if ($request->Quality != null)
                $q = $q->where('image_quality', 'LIKE', $request->Quality . '%');
            if ($request->DateFrom != null && $request->DateTo != null)
                $q = $q->whereBetween('image_date', [$request->DateFrom, $request->DateTo]);
            else {
                if ($request->DateFrom != null)
                    $q = $q->where('image_date', '=', $request->DateFrom);
                if ($request->DateTo != null)
                    $q = $q->where('image_date', '=', $request->DateTo);
            }
            if ($request->ImageType != null)
                $q = $q->where('image_type', '=', $request->ImageType);
            if ($request->ColorType != null)
                $q = $q->where('image_color_mode', '=', $request->ColorType);
            if ($request->vips != null) {
                $Imagesofvips = VipsInImages::whereIn('vip_id', $request->vips)->pluck("image_id");
                $q = $q->whereIn('id', $Imagesofvips);
            }
            $data = [
                'images' => $q->get()
            ];
            return response()->json($data);
        } catch (Exception $ex) {
            return response()->json($ex);
        }
    }
}
