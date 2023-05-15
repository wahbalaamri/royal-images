<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipsName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'vip_group',
        'vip_title',
        'nationality',

    ];
    public function ImagesOfVipsName()
    {
        return $this->hasMany(VipsInImages::class,'vip_id');
    }
    //has one vip_titles
    public function vipTitle()
    {
        return $this->belongsTo(VipTitles::class,'vip_title');
    }
    //has one vip_group
    public function vipGroup()
    {
        return $this->belongsTo(VipGroups::class,'vip_group');
    }
    //has ona nationality
    public function nationality()
    {
        return $this->belongsTo(Nationalities::class,'nationality');
        # code...
    }
}
