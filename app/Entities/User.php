<?php

namespace Judici\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at'
    ];

    protected $fillable = [
        'username', 'nombre', 'apellido', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
