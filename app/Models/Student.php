<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','birthdate','gender','institution_id','entry_date'];

    public function institution(){
       return $this->belongsTo(institution::class);
    }
}
