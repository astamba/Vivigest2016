<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AspettoBeni extends Authenticatable
{
    protected $table = 'aspettobeni';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione'
    ];

    public $timestamps = true;

    protected $primaryKey = 'Codice';

    protected $casts = ['Codice' => 'string'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
