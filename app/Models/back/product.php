<?php

namespace App\Models\back;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory,Sluggable;


    protected $fillable=[
        'name','slug','description','author','user_id','price','img','thumbnail','discount','tedad_mojod','abstract'
    ];

    protected $attributes=[
        'status'=>0,
        'hit'=>1,
    ];


    //********************slug******************************

    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }


    //*********************************Relations***************************

    //******category
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    //*******author
    public function user(){
        return $this->belongsTo(\App\Models\back\User::class);
    }



    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'name'
            ]
        ];
        // TODO: Implement sluggable() method.
    }
}
