<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Maincategory extends Model
{
    use Sluggable;
    
    protected $fillable = ['name', 'slug',  'type', 'quantity_unit', 'description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subcategories() // 
    {
        return $this->hasMany('\App\Subcategory');
    }

    public function products() // Other users he entered
    {
        return $this->hasMany('\App\Product');
    }

}
