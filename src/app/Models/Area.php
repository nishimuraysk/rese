<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name',
    ];

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }
}
