<?php

namespace Judici\Entities;

class Expediente extends Entity
{
    protected $table = 'expedientes';

    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    protected $with = ['rama'];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps();
    }

    public function jurisdiccion()
    {
        return $this->belongsTo(Jurisdiccion::class);
    }

    public function rama()
    {
        return $this->belongsTo(Rama::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
