<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\Storage;

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

    public function photo()
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }

    public function adminlte_image()
    {
        if ($this->photo) 
            return asset('storage/users/'.$this->photo->file);
        return '/vendor/adminlte/dist/img/user.png';
    }

    public function adminlte_desc()
    {
        return $this->description;
    }

    public function adminlte_profile_url()
    {
        return 'admin/profile';
    }
}
