<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    public function Category(){

   		return $this->belongsTo('App\Category');
   }
   public function Account(){

   	return $this->belongsTo('App\Account');
   }
}
