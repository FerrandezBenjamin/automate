<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Groupe;
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
        $allUser = User::all();
        return view('admin.gestion_user', compact(
            'allUser'
        ));
    }

    public function admin_gestion_groupe()
    {
        $allUser = User::orderBy('name', 'ASC')->orderBy('groupe_id', 'ASC')->get();
        $allGroupes = Groupe::all();
        return view('admin.gestion_groupe', compact(
            'allGroupes',
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
}
