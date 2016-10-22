<?php

namespace Judici\Entities;

class Rama extends Entity
{
    protected $table = 'ramas';

    protected $fillable = ['rama'];
    
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }
}
