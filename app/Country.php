<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function metadata()
    {
        return $this->hasMany('App\Metadata','country_id');
    }
}