<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vettori extends Authenticatable
{
    protected $table = 'vettori';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'Telefono', 'Fax', 'EMail', 'CodiceFornitore'
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
