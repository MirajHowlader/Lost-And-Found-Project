<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Notice extends Controller
{
    public function addNoticepage(){
        return view('backend.addnotice');
     }
}
