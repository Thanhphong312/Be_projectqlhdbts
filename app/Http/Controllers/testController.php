<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class testController extends Controller
{
    public function test()
    {
        $user = User::where('id', 1)->first();
        if ($user) {
            dd($user->quyennguoidungs);
        } else {
            dd('User not found');
        }
    }
    
}
