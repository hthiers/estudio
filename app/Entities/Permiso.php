<?php

namespace Judici\Entities;

class Permiso extends Entity
{
    protected $table = 'permisos';
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    public function users()
    {
        return $this->belongsToMany(Rol::class);
    }
}
