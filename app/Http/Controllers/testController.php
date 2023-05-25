<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class testController extends Controller
{
    public function test(){
       User::where(1)->nguoidungs();
    }
}
