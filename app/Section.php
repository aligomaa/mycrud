<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function book()
    {
	 return $this->hasMany('App\Book');
    }
}
