<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'bland', 'image', 'price', 'line', 'dress_length', 'url'];

    public function bookmark()
  {
    return $this->hasMany('\App\Models\bookmark');
  }

    public static function boot()
  {
    parent::boot();

    static::deleting(function($item) {
      $item->bookmark()->delete();
    });
  }
}
