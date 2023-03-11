<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Groupe;
use App\Models\Role;
use App\Models\User;

class AdminController extends Controller
{

    public function index_admin()
    {
        $adminCo = Auth::user();
        return view('admin.dashboard', compact(
            'adminCo'
        ));
    }

    public function admin_user()
    {
        $allUsers = User::all();
        $allGroupes = Groupe::all();
        return view('admin.gestion_user', compact(
            'allGroupes',
            'allUsers'
        ));
    }

    public function admin_gestion_groupe()
    {
        $allUsers = User::orderBy('name', 'ASC')->orderBy('groupe_id', 'ASC')->get();
        $allGroupes = Groupe::all();
        return view('admin.gestion_groupe', compact(
            'allGroupes',
            'allUsers',
        ));
    }

    public function admin_role()
    {

        $allRoles = Role::all();
        $allUser = User::all();
        return view('admin.gestion_role', compact(
            'allRoles',
            'allUser',
        ));
    }

    public function admin_new_groupe()
    {
        return view('admin.new_groupe');
    }

    public function admin_groupe_random()
    {
        return view('group.random');
    }

    public function admin_delete_groupe(Request $req)
    {
        $values = $req->validate([
            'groupeID' => 'required'
        ]);

        Groupe::find($values['groupeID'])->deleteCascade();

        return back()->with('message', 'Le groupe a bien été supprimé.');
    }

    public function admin_delete_user(Request $req)
    {
        $values = $req->validate([
            'userID' => 'required'
        ]);

        if ($user = User::find($values['userID']))
            $user->delete();

        return back()->with('message', "L'utilisateur a bien été supprimé.");
    }
    public function admin_delete_role(Request $req)
    {
        $values = $req->validate([
            'roleID' => 'required'
        ]);

        if ($role = Role::find($values['roleID']))
            $role->delete();

        return back()->with('message', "Le role a bien été supprimé.");
    }

    public function admin_assign_groupe_to_user(Request $req)
    {
        $values = $req->validate([
            'userID' => 'required',
            'groupeID' => 'nullable'
        ]);

        if ($user = User::find($values['userID'])) {

            if ($values['groupeID'] == null || $values['groupeID'] == "")
                $user->groupe_id = null;
            else
                $user->groupe_id = $values['groupeID'];

            $user->update();
        } else {
            return back()->withErrors("L'utilisateur n'a pas été trouvé.");
        }

        return back()->with('message', "Modification appliqué.");
    }
}
