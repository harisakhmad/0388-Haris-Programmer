<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users=User::paginate(8);    
        // dd($users);
        return view('admin.master.user.index',compact('users'));
    }
}
