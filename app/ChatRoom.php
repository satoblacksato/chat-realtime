<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Storage;
class ChatRoom extends Model
{
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
}
