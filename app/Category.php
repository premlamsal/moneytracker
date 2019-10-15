<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


   public function transcation(){

   		return $this->hasMany('App\Transcation');
   }

}
