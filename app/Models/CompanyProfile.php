<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{

    protected $table = "company_profile";
    protected $fillable = [
        'name',
        'logo',
        'message',
        'goals',
        'vision',
        'mobile',
        'address',
        'email',
        'en_message',
        'en_goals',
        'en_vision',
        'en_address',
        'en_about',
        'about',
        'en_name',
        'values',
        'en_values'
    ];

    protected $appends = ['logo_full_path'];

    public function getLogoFullPathAttribute()
    {
        return $this->attributes['logo'] ? env('APP_URL')  . '/images/company/' . $this->attributes['logo'] : null;
    }
}
