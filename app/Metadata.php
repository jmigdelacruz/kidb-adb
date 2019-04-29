<?php

namespace App;
use App\Country;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $table = 'metadata';

    public function countries()
    {
        return $this->hasMany('App\Country','id');
    }
}