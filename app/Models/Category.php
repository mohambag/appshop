<?php

namespace App\Models;


use App\Models\product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory, Sluggable;

    public $fillable = [
        'name', 'slug','user_id'
    ];

    protected $attributes = [
        'parent_id' => null,
    ];


    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
        // TODO: Implement sluggable() method.
    }
}
