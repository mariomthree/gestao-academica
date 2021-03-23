<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> main
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name'];

    public function districts(){
        return $this->hasMany(District::class); 
    }
=======
    use HasFactory;

    protected $fillable = [
        'name'
    ];
>>>>>>> main
}
