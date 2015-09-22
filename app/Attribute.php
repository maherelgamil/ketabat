<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $fillable = [
		'name',
		'desc',
	];

    /**
     * The Products that belong to the attribute.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('value');
    }
}
