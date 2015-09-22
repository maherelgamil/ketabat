<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

	protected $fillable = [
		'name',
		'price',
		'qty',
		'desc',
	];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 10
        ]
    ];

    public function posts()
    {
        return $this->hasMany('Post');
    }

    /**
     * The Attributes that belong to the product.
     */
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute')->withPivot('value')->withTimestamps();
    }
}
