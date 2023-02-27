<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    function new()
    {
        return view('group.new');
    }

    function random()
    {
        return view('group.random');
    }

    function join()
    {
        return view('group.join');
    }
}
