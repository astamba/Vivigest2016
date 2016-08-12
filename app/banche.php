<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Banche extends Authenticatable
{
    protected $table = 'banche';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'Iban'
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
