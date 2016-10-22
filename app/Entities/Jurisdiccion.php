<?php

namespace Judici\Entities;

class Jurisdiccion extends Entity
{
    protected $table = 'jurisdicciones';

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
