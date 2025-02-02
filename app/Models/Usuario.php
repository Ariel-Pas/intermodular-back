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
        'name',
        'email',
        'password',
        'role'
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

    //MANEJO DE VISTAS
    public function esAdmin() {
        return $this->role === 'Admin';
    }

    public function esCentro(){
        return $this->role === 'Centro';
    }

    public function esTutor(){
        return $this->role === 'Tutor';
    }

}

