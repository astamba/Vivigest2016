<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pagamenti extends Authenticatable
{
    protected $table = 'pagamenti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'DataFrom', 'ggFissi1', 'ggFissi2', 'ggFissi3', 'ggPartenza', 'NumScadenze', 'ggIntervallo', 'NumScadenze', 'Tipologia', 'PercAcconto',
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
