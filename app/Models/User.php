<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status', 'address', 'pesel', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctorsVisits() {
        return $this->hasMany(Visit::class, 'doctor_id');
    }

    public function patientsVisits() {
        return $this->hasMany(Visit::class, 'patient_id');
    }

    public function specializations() {
        return $this->belongsToMany(Specialization::class, 'specialization_users');
    }

    public function visits() {
        //return $this->belongsToMany(User::class, 'visits');
        return $this->hasManyThrough('App\Models\User', 'App\Models\Visit', 'doctor_id', 'id');
    }
}
