<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthCheckController extends Controller
{
    public function check()
    {
        $user = auth()->user();

        if($user->roles === 'admin')
        {
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('user.index');
        }
    }
}
