<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','birthdate','gender','institution_id','entry_date'];

    public function institution(){
       return $this->belongsTo(Institution::class);
    }
}    
