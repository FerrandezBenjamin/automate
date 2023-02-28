<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Groupe;


class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allUser = User::orderBy('role', 'ASC')->get();
        $allGroupe = Groupe::all();
        $userWithoutGroupe = Groupe::noGroupeUser();

        return view('home', compact(
            'user',
            'allUser',
            'allGroupe',
            'userWithoutGroupe',
        ));
    }
}
