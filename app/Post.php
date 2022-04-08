<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // ricorda di aggiungere elemento delle nuove colonne create 

    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    // vincoli integrità tra le tabelle definito sia in post che in category
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
