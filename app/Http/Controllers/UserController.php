<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewWelc(){
       return view('welcome');
    }
    public function viewTambahKata(){
       return view('admin.ubahkata');
    }
    
}
