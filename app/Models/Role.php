<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $role  = 'role'; //Indica que tabela a conectar
=======
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    protected $fillable = ['name','display_name','description'];
>>>>>>> main
}
