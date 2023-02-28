<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Groupe;
use App\Models\User;

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

    function join(Request $req)
    {
        $values = $req->validate([
            'groupeID' => 'required',
            'userID' => 'required'
        ]);

        if ($user = User::find($values['userID'])) {
            $user->groupe_id = $values['groupeID'];
            $user->update();
        };

        return back()->with('message', 'Vous avez rejoins le groupe !');
    }
}
