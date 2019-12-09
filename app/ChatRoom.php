<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};
use Illuminate\Http\UploadedFile;
use Storage;
use Cviebrock\EloquentSluggable\Sluggable;
class ChatRoom extends Model
{
    use SoftDeletes, Sluggable;
    //
    protected $fillable=['name','description','path_image'];


    public function users(){
        return $this->belongsToMany(User::class)
        ->as('suscription')
        ->withPivot('id','available')
        ->withTimestamps();
    }

    public function messages(){
        return $this->hasManyThrough(Message::class,ChatRoomUser::class);
    }

    public function setPathImageAttribute($value)
    {
        if($value instanceof UploadedFile){
            Storage::disk('public')->delete($this->path_image);
            $this->attributes['path_image'] = $value->storeAs('images', uniqid().'.jpg', 'public');
        }
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
