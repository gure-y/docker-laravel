<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function items(){
        return $this ->hasMany('App\Models\Item');
    }

    protected $fillable = ['name', 'bland', 'image', 'price', 'line', 'dress_length', 'url'];
}
