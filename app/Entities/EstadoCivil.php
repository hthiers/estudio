<?php

namespace Estudio\Entities;

class EstadoCivil extends Entity
{
    protected $table = "estados_civiles";
    
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
