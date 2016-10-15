<?php

namespace Estudio\Entities;

class Cliente extends Entity
{
    protected $table = "clientes";
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function expedientes()
    {
        return $this->belongsToMany(Expediente::class)->withTimestamps();
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class);
    }

    public function estudio()
    {
        return $this->belongsTo(Estudio::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
