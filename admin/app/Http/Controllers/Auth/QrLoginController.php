<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Crypt;

class QrLoginController extends Controller
{

    public function checkUser(Request $request) {
        try {
            $decrypted = Crypt::decrypt($request->data);
            $data = explode(',', $decrypted);
            if ($this->attemptLogin($data)) {
                return true;
            }
        } catch (DecryptException $e) {
            return false;
        }
    }

    protected function attemptLogin($data)
    {
        return $this->guard()->attempt([
                'username' => $data[1], 'password' => $data[2]
        ]);
    }


    protected function guard()
    {
        return Auth::guard();
    }
}
