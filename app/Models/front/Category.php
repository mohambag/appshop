<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        'name', 'slug','user_id'
    ];

    protected $attributes = [
        'parent_id' => null,
    ];

    public function products(){
        return $this->belongsToMany(product::class);
    }

}
