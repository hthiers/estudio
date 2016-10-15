<?php

namespace Estudio\Entities;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    
    protected $fillable = [
        'rol'
    ];

    protected $dates = [
    		'created_at',
    		'updated_at',
    		'deleted_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
