<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Contatori extends Authenticatable
{
    protected $table = 'contatori';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'Esercizio', 'Valore'
    ];

    public $timestamps = true;

    protected $primaryKey = 'ID';

    //protected $casts = ['Codice' => 'string'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
