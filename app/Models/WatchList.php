<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;
    public function movie(){
        return $this->belongsTo(Movies::class,'movie_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
