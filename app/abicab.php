<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AbiCab extends Authenticatable
{
    protected $table = 'abicab';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'Indirizzo', 'Cap', 'Localita', 'Provincia'
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
