<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'area_id',
        'category_id',
        'summary',
        'image'
    ];

    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function representative()
    {
        return $this->hasOne('App\Models\Representative');
    }

    public function scopeAreaSearch($query, $area_id)
    {
        if (!empty($area_id)) {
            $query->where('area_id', $area_id);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    }
}
