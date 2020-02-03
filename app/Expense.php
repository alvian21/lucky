<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function income(){
    	return $this->hasMany('App\Income');
    }
}
