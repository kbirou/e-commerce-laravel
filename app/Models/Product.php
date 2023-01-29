<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];
// has one category
public function category(){
    return $this->belongsTo(Category::class);
}
// has one or many colors
public function colors(){
    return $this->belongsToMany(Color::class);
}
}