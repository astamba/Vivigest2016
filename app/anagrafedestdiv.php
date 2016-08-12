<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AnagrafeDestDiv extends Authenticatable
{
    protected $table = 'anagrafedestdiv';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Indirizzo', 'Cap', 'Localita', 'Provincia', 'Telefono', 'Fax', 'EMail', 'CodiceCliFor',
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
