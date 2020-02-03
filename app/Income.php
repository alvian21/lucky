<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public function expense(){
    	return $this->belongsTo('App\Expense');
    }
}
