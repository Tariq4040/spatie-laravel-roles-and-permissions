<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('updated_at','desc')->paginate(5);
        return view('users.index' , compact('users'));
    }

    public function store(){
        return "Store Data";
    }
}
