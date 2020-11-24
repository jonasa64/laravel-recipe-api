<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function instructions(){
        return $this->hasMany('App\Models\Instruction');
    }

    public function ingredients(){
        return $this->hasMany('App\Models\Ingredient');
    }

}
