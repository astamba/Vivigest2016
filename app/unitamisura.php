<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UnitaMisura extends Authenticatable
{
    protected $table = 'unitamisura';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'IsDim1', 'IsDim2', 'IsDim3', 'DescrizioneDim1', 'DescrizioneDim2', 'DescrizioneDim3'
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
