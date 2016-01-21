<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
		/**
		* cost is dynamically provided
		*/
		
    public function scopeCheap($query,$cost)
    {
    	return $query->where('price','<',$cost);
				 
    }
}
