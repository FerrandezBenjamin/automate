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

    function gestion()
    {
        return view('group.gestion');
    }

    function join(Request $req)
    {
        $values = $req->validate([
            'groupeID' => 'required',
            'userID' => 'required'
        ]);

        if ($group = Groupe::find($values['groupeID'])) {

            if ($user = User::find($values['userID'])) {
                $user->groupe_id = $group->id;
                $user->update();

                return back()->with('message', 'Vous avez rejoins le groupe : ' . $group->name . ' !');
            }
        } else {
            return back()->withError('Le groupe est inconnu');
        }
    }

    function quit(Request $req)
    {
        $values = $req->validate([
            'userID' => 'required',
            'groupeID' => 'required'
        ]);

        if ($group = Groupe::find($values['groupeID'])) {

            if ($user = User::find($values['userID'])) {
                $user->groupe_id = null;
                $user->update();

                return back()->with('message', 'Vous avez quitté le groupe : ' . $group->name . ' !');
            }
        } else {
            return back()->withError('Le groupe est inconnu');
        }
    }
}
