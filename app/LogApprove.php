<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogApprove extends Model
{
    public function admins()
    {
      return $this->belongsToMany(Admin::class);
    }
}
