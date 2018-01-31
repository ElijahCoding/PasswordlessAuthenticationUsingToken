<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auth\MagicAuthentication;

class MagicLoginController extends Controller
{
    protected $redirectOnRequested = '/login/magic';

    public function show()
    {
      return view('auth.magic.login');
    }

    public function sendToken(Request $request, MagicAuthentication $auth)
    {
      $this->validateLogin($request);

      $auth->requestLink();

      return redirect()->to($this->redirectOnRequested)
                       ->withSuccess('We\'ve sent you a magic link!');
    }

    protected function validateLogin(Request $request)
    {
      $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);
    }
}
