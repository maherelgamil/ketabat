<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Tag extends Model implements SluggableInterface {

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

	/**
	 * variable that can be mass asigned.
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

    /**
     * Get articles associated with the given tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
