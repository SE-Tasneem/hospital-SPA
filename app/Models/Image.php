<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'status'];

    protected $appends = ['image_full_path'];

    public function getImageFullPathAttribute()
    {
        return $this->attributes['image'] ? env('APP_URL')  . '/images/gallery/' . $this->attributes['image'] : null;
    }
}
