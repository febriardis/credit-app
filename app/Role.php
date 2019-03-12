<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $table = 'roles';

    // protected $fillable = ['name'];

    public function admins()
    {
      return $this->belongsToMany(Admin::class);
    }
}
