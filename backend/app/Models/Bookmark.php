<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark'; //テーブルを単数系で作ってしまったので追加

    public function item() //Itemモデルに対してのアソシエーション
   {
       return $this->belongsTo('\App\Models\Item');//Itemモデルに対しての自分の立場を書く
   }

    protected $fillable = ['item_id', 'user_id'];
}
