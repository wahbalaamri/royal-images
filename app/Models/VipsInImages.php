<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipsInImages extends Model
{
    use HasFactory;

    public function imagesofvips()
    {
        return $this->hasMany(images::class,'image_id');
    }
    public function vipsInImage()
    {
        return $this->hasMany(VipsName::class,'vip_id');
    }
}
