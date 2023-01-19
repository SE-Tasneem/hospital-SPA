<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','en_name', 'image', 'department', 'en_department', 'status'
    ];

    protected $appends = ['image_full_path'];

    public function getImageFullPathAttribute()
    {
        return $this->attributes['image'] ? env('APP_URL')  . '/images/doctors/' . $this->attributes['image'] : null;
    }
}
