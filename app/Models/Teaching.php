<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  public function institutions()
  {
    return $this->belongsToMany(Institution::class);
  }
 
}
