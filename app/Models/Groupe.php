<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Groupe extends Model
{
    use HasFactory;

    public function userInGroupe()
    {
        return $this->hasMany(User::class, 'groupe_id', 'id');
    }

    public static function noGroupeUser()
    {
        return User::whereNull('groupe_id')->get();
    }

    public function deleteCascade()
    {
        foreach ($this->userInGroupe as $user) {
            $user->groupe_id = null;
            $user->update();
        }

        $this->delete();
    }
}
