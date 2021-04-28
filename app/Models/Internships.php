<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internships extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function institutions()
    {
      return $this->belongsToMany(Institution::class);
    }
}
