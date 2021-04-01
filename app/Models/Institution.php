<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    
   protected $fillable = ['name','district_id','user_id'];

   public function user(){
      return $this->belongsTo(User::class);
   }

   public function district(){
      return $this->belongsTo(District::class);
   }

   public function teachings()
   {
      return $this->belongsToMany(Teaching::class);
   }
   
   public function students()
   {
      return $this->hasMany(Student::class);
   }

   public function teachers()
   {
      return $this->hasMany(Teacher::class);
   }

}
