<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

//implements SluggableInterface 

class Article extends Model {

    use SluggableTrait;

/*    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );*/
    
	/**
	 * variable that can be mass assigned.
	 * @var array
	 */
	protected $fillable = [
		'title',
		'body',
		'published_at'
	];

	protected $dates = ['published_at'];

	/**
	 * get published post.
	 * 
	 * @return query
	 */
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}

	/**
	 * get unpublished postdiffForHumanss.
	 * 
	 * @return query
	 */
	public function scopeUnpublished($query)
	{
		$query->where('published_at', '>', Carbon::now());
	}

	/**
	 * parse time part in date.
	 * 
	 * @param date $date
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}

	/**
	 * An article is owned by a user.
	 * 
	 * @return belongto
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

    /**
     * give tags to given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

    /**
     * give uploads to given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function uploads()
    {
        return $this->belongsToMany('App\Upload')->withTimestamps();
    }

    /**
     * Get tag id associated with the current article.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
