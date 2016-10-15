<?php

namespace Estudio\Entities;

class Comentario extends Entity
{
    protected $table = 'comentarios';

    protected $fillable = [
    	'comentario', 
    	'user_id'
    ];
    
    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
