<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupeController extends Controller
{
    function index()
    {
        return view('group.liste_groupe');
    }
}
