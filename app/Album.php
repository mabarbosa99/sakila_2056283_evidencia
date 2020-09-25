<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "albums";
    protected $primaryKey = "AlbumId";
    public $timestamps = false;

     //extender el modelo: artista tiene muchos Albumes
     public function caciones(){
        return $this->hasMany('App\Cancion','AlbumId');
     }
}
