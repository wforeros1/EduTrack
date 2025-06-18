<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'first_name',       // <-- Corregido
        'last_name',        // <-- Corregido
        'email',
        'password',
        'role_id',          // <-- Añadido
        'institution_id',   // <-- Añadido
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}