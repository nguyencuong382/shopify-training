<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundles extends Model
{
    protected $fillable = [
      'name',
      'visitors',
      'stats',
      'sales',
      'status',
    ];

    public function products() {
      
    }
}
