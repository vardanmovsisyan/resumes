<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    public $primaryKey = 'id';

    public function categories(){
        $this->belongsToMany('App\Category');
    }

    public function users(){
        $this->belongsToMany('App\User');
    }
}
