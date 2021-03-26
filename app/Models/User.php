<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'telephone',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    public function photo()
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }

    public function adminlte_image()
    {
        if ($this->photo) 
            return $this->photo->file;
        return '/vendor/adminlte/dist/img/user.png';
    }

    public function adminlte_desc()
    {
        return $this->description;
    }

    public function adminlte_profile_url()
    {
        return 'admin/users/'.Auth::user()->id.'/edit';
    }
}
