<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationalities extends Model
{
    use HasFactory;
    // has many VipsName
    public function VipsNames()
    {
        return $this->hasMany(VipsName::class,'nationality');
    }
}
