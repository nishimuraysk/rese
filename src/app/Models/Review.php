<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
        'evaluation',
        'comment'
    ];

    public function shop()
        {
            return $this->belongsTo('App\Models\Shop');
        }

    public function user()
        {
            return $this->belongsTo('App\Models\User');
        }
}
