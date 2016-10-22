<?php

namespace Judici\Entities;

class Estudio extends Entity
{
    protected $table = 'estudios';
    
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
