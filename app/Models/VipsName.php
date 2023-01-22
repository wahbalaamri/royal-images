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
        
    ];
    public function ImagesOfVipsName()
    {
        return $this->hasMany(VipsInImages::class,'vip_id');
    }
}
