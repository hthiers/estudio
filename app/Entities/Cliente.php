<?php

namespace Judici\Entities;

use Cviebrock\EloquentSluggable\Sluggable;

class Cliente extends Entity
{
    use Sluggable;

    protected $table = "clientes";
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $with = ['estadoCivil'];

    protected $appends = ['fullname'];
    // Relaciones
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

    /**
     * Devuelve la configuracion del slug.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'fullname',
                'unique' => true
            ]
        ];
    }

    public function getFullnameAttribute() {
        return $this->nombre.' '.$this->apellido;
    }

    public function setFullnameAttribute() {
        $this->attributes['fullname'] = ucfirst($this->nombre.' '.$this->apellido);
    }

}
