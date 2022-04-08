<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug'];

    // definisci funzione per definire relazione tra le tabelle
    public function posts() {
        return $this->hasMany('App\Post');
    }
}