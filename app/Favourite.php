<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{

    protected $table = 'favourites';

    protected $fillable = [
        'contact_id',
        'user_id'
    ];

}