<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    use HasFactory;
    public function actors(){
        return $this->hasMany(Movies::class, "id", "id");
    }
    protected $table ='Actors';
    protected $primaryKey = "id";
}
