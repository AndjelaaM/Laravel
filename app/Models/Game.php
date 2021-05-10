<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable=['name','image','price','min_age','genre_id'];
   
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
