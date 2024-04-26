<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    public function actors(){
        return $this->hasMany(Actors::class, "actors_id", "id");
    }
    protected $table ='Movies';
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
