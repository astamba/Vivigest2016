<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/08/2016
 * Time: 13:59
 */

use App\AbiCab;

$abicabs = AbiCab::all(['Codice', 'Descrizione']);

return $abicabs->toJson();

?>