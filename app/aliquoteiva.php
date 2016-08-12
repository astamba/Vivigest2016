<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AliquoteIva extends Authenticatable
{
    protected $table = 'aliquoteiva';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'Descrizione', 'Aliquota', 'Esenzione', 'DescrizioneEstesa'
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
