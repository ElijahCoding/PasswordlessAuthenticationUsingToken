<?php

namespace App\Auth\Traits;
use App\UserLoginToken;

trait MagicallyAuthenticatable
{
  public function storeToken()
  {
    $this->token()->delete();

    $this->token()->create([
      'token' => str_random(255)
    ]);

    return $this;
  }

  public function token()
  {
    return $this->hasOne(UserLoginToken::class);
  }


}
