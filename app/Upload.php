<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'size', 'type'];

    /**
     * give article to given upload.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
       return $this->belongsToMany('App\Article')->withTimestamps();
    }

    /**
     * Generate unique name based on the
     * uniqid() function
     *
     * @param $file requested file to upload
     */
    public static function put($file)
    {
        if ($file->isValid()) {
            $name = uniqid() . '.' . $file->guessExtension();
            $fileInfo = [
                'name' => $name,
                'type' => $file->getMimeType(),
                'size' => $file->getClientSize()
            ];
            $file->move(public_path().'/uploads', $name);

            $upload = new Upload();
            $upload->name = $fileInfo['name'];
            $upload->type = $fileInfo['type'];
            $upload->size = $fileInfo['size'];
            $upload->save($fileInfo);
            //dd($upload->id);
            return [$upload->id];
        } else {
            return $file->getErrorMessage();
        }
    }
}
