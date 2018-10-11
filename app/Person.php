<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table='people';

    public $primaryKey='id';

    public $timestamps =false;

    protected $fillable=[
        'first_name','last_name','keywords','resume'
    ];
}
