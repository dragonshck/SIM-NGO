<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'cover_picture'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tutor()
    {
        return $this->hasOne(TutorAnak::class);
    }

    public function anak()
    {
        return $this->hasOne(AnakPPA::class);
    }

    public function staff()
    {
        return $this->hasOne(StaffPPA::class);
    }

    public function routeNotificationForMail($notification)
    {
        // Jika di table users ada kolom email untuk notifikasi
        return $this->email;

        // Jika di table users ada kolom email dan nama untuk notifikasi
        return [$this->email => $this->name];
    }
}
