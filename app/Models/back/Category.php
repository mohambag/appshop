<?php

namespace App\Models\back;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    public $fillable = [
        'name', 'slug','user_id','city','color','img','thumbnail'
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
        return $this->belongsTo(Category::class);
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
