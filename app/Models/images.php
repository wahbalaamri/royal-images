<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_date',
        'image_year',
        'image_month',
        'vips_in_image',
        'image_occasion',
        'image_location',
        'image_color_mode',
        'image_quality',
        'image_type',
        'image_file_type',
    ];

    public function vipsInImages()
    {
        return $this->hasMany(vipsInImages::class,'image_id');
    }
}
