<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskGroupe extends Model
{
    use HasFactory;
    protected $table = "ask_groupe";
    public $timestamps = false;



    public function nameUser()
    {
        return $this->hasOne(User::class, 'id', "user_id");
    }

    public function nameGroupe()
    {
        return $this->hasOne(Groupe::class, 'id', "groupe_id");
    }
}
