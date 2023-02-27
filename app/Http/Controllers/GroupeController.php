<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupeController extends Controller
{
    function index()
    {
        return view('group.liste_groupe');
    }

    function ajout_groupe()
    {
        return view('group.ajout_groupe');
    }
}
