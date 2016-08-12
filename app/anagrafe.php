<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Anagrafe extends Authenticatable
{
    protected $table = 'anagrafe';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codice', 'RagioneSociale', 'Indirizzo', 'Cap', 'Localita', 'Provincia', 'Gruppo', 'PartitaIva', 'CodiceFiscale', 'Telefono', 'Fax', 'Cellulare',
        'EMail', 'EMail2', 'AliquotaIva', 'Sconto', 'AbiCab', 'CodicePagamento', 'DichEsenzione', 'Iban', 'Tipo', 'RitenutaAccontoAttiva'
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
