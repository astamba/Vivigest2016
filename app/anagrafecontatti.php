<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AnagrafeContatti extends Authenticatable
{
    protected $table = 'anagrafecontatti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Referente', 'Posizione', 'EMail', 'Telefono', 'Fax', 'Cellulare', 'CodiceCliFor'
    ];

    public $timestamps = true;

    protected $primaryKey = 'ID';

    //protected $casts = ['codice' => 'string'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
