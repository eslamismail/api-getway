<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Room extends Model
{
    protected $fillable = [
        'name',
        'image_name',
        'type',
    ];

    protected $appends = [
        'image',
    ];

    protected $hidden = [
        'image_name',
    ];

    public function getImageAttribute()
    {
        if (Storage::disk('uploads')->exists($this->image_name)) {
            return url(Storage::disk('uploads')->url($this->image_name));
        }
    }
}
