<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLoginToken extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
      return 'token';
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
