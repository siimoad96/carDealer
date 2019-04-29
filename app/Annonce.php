<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    public $table="annonces";
    public function voitureitem()
    {
      return $this->belongsTo('App\Voiture', 'foreign_key');
    }
}
