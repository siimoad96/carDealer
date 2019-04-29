<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{

    public $table="voitures";
    public function annonceitems()
    {
      return $this->hasMany('App\Annonce');
    }
}
