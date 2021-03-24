<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    
    protected $fillable = ['name','district_id','user_id'];

    /*public function institution(){
       return $this->belongsTo(institution::class);
    }*/

}
