<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Groupe;
use App\Models\User;
use App\Models\AskGroupe;

class GroupController extends Controller
{



    // public function join_groupe(Request $req)
    // {
    //     $values = $req->validate([
    //         'groupeID' => 'required',
    //         'userID' => 'required'
    //     ]);

    //     if ($group = Groupe::find($values['groupeID'])) {

    //         if ($user = User::find($values['userID'])) {
    //             $user->groupe_id = $group->id;
    //             $user->update();

    //             return back()->with('message', 'Vous avez rejoins le groupe : ' . $group->name . ' !');
    //         }
    //     } else {
    //         return back()->withError('Le groupe est inconnu');
    //     }
    // }

    public function join_groupe(Request $req)
    {
        $values = $req->validate([
            'groupeID' => 'required',
            'userID' => 'required'
        ]);


        

        if ($group = Groupe::find($values['groupeID'])) {

            if (auth()->user()->roles()->where('name', 'administrator')->exists()) {
                $user = Auth()->user();
                $user->groupe_id = $values['groupeID'];
                $user->save();
            
                return back()->with('message', 'Vous avez rejoint le groupe : ' . $group->name . ' !');
            } else {


                if ($user = User::find($values['userID'])) {

                    $askJoinGroupe = New AskGroupe;

                    $askJoinGroupe->user_id = $user->id;
                    $askJoinGroupe->groupe_id = $group->id;
                    $askJoinGroupe->save();

                    return back()->with('message', 'Votre demande pour rejoindre le groupe : ' . $group->name . ' a bien été prise en compte !');
                }
            }
        } else {
            return back()->withError('Le groupe est inconnu');
        }
    }

    public function quite_groupe(Request $req)
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
