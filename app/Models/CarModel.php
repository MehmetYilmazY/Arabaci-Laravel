<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['name','brand'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
