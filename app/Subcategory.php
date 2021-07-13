<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
{
    use Sluggable;
    
    protected $fillable = ['maincategory_id', 'name', 'slug', 'description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function maincategory() // 
    {
        return $this->belongsTo('\App\Maincategory');
    }

    public function products() // Other users he entered
    {
        return $this->hasMany('\App\Product');
    }
}
