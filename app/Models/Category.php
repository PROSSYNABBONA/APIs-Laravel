<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //public $timestamps = false;
     public function products(){
        return $this->hasMany(Product::class);
     }
    use HasFactory;

       protected $fillable = [
        'name',
        'description',

    ];
        public $timestamps = false ;

}
