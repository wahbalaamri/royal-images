<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipTitles extends Model
{
    use HasFactory;
    //hasmany VipsName
    public function VipsName()
    {
        return $this->hasMany(VipsName::class,'vip_title');
    }
}
