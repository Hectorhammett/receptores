<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manifiesto extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Manifiesto';
    
    public function generador(){
        return $this->belongsTo( 'App\Empresa', 'idGenerador' );
    }

    public function receptor(){
        return $this->belongsTo( 'App\Empresa', 'idReceptor' );
    }

    public function transportador(){
        return $this->belongsTo( 'App\Empresa', 'idTransportador' );
    }

    public function residuos(){
        return $this->belongsToMany( 'App\Residuo', 'Residuo_has_Manifiesto', 'Manifiesto_id', 'Residuo_id' );
    }
}
