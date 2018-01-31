<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auth\MagicAuthentication;

class MagicLoginController extends Controller
{
    public function show()
    {
      return view('auth.magic.login');
    }

    public function sendToken(Request $request, MagicAuthentication $auth)
    {
      $this->validateLogin($request);

      $auth->requestLink();
    }

    protected function validateLogin(Request $request)
    {
      $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);
    }
}
