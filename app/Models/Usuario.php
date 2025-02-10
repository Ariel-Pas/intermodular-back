<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Centro;

use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    protected $table = 'users';
   //  @use HasFactory<\Database\Factories\UsuarioFactory>;
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //RELACIONES
    public function centro(){
        return $this->belongsTo(Centro::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_usuario', 'usuario_id', 'role_id');
    }

    //MANEJO DE VISTAS
    public function tieneRol($rolNombre)
    {
        return $this->roles()->where('nombre', $rolNombre)->exists();
    }

}

