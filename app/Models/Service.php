<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'name','en_name', 'image', 'description','en_description','icon','status'
    ];

    protected $appends = ['image_full_path'];

    public function getImageFullPathAttribute()
    {
        return $this->attributes['image'] ? env('APP_URL')  . '/images/services/' . $this->attributes['image'] : null;
    }
}
