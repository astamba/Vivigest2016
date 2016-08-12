<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Clienti extends Authenticatable
{
    protected $table = 'clienti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codice', 'ragionesociale', 'aliquota', 'abicab', 'cap', 'cellulare', 'email', 'fax', 'gruppo', 'iban', 'indirizzo', 'pagamento', 'provincia', 'sitoweb', 'telefono',
    ];

    public $timestamps = true;

    protected $primaryKey = 'codice';

    protected $casts = ['codice' => 'string'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
