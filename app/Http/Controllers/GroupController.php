<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Groupe;
use App\Models\User;

class GroupController extends Controller
{
    function new()
    {
        return view('admin.new_groupe');
    }

    function random()
    {

        return view('group.random', compact(
            '',
        ));
    }

    function gestion()
    {
        $allGroupes = Groupe::all();
        return view('admin.gestion', compact(
            'allGroupes',
        ));
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

    function delete_groupe(Request $req)
    {
        $values = $req->validate([
            'groupeID' => 'required'
        ]);

        Groupe::find($values['groupeID'])->deleteCascade();

        return back()->with('message', 'Le groupe a bien été supprimé.');
    }
}
