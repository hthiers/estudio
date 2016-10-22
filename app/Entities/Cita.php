<?php

namespace Judici\Entities;

class Cita extends Entity
{
    protected $table = "citas";
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
