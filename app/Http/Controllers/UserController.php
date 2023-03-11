<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Groupe;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    public function create_user_view()
    {
        return view('admin.create_user_view');
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect('/admin/dashboard');
    }

    public function create_fake_user()
    {
        //
        $nbFake = 30;

        for ($i = 0; $i < $nbFake; $i++) {
            $userFake = new User;
            $faker = FakerFactory::create('fr_FR');

            $userFake->name = $faker->name;
            $userFake->email = $faker->unique()->safeEmail();
            $userFake->email_verified_at = now();
            $userFake->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $userFake->remember_token = Str::random(10);
            $userFake->save();
        }

        return back()->with('message', "30 Utilisateurs aléatoire ont été ajoutés.");
    }
}
