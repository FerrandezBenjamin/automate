@extends('layouts.admin')

@section('title', "Creation d'utilisateur")


@section('content')
<div class="containerGestion">
    <div class="titlePage">
        <h2>Creation d'utilisateur</h2>
    </div>

    <div class="containerOnAdmin">
        <span class="titleOnContainerAdmin">Creer un utilisateur
        </span>

        <div class="formContainer">

            <form action="{{route ('admin.create_user')}}" class="formBen" method="POST">
                @csrf

                <div class="inContainerForm">

                    <div class="mt-4">
                        <label for="nameUser">Le nom</label>
                        <input class="block mt-1 w-full inputOnform" type="text" name='nameUser'>
                    </div>

                    <div class="mt-4">
                        <label for="surnamUser">Le prénom</label>
                        <input class="block mt-1 w-full inputOnform" type="text" name='surnamUser'>
                    </div>

                    <div class="mt-4">
                        <label for="password">Mot de passe</label>
                        <input class="block mt-1 w-full inputOnform" type="text" name='password'>
                    </div>

                    <div class="mt-4">
                        <label for="confpsswUser">Confirmation du mot de passe</label>
                        <input class="block mt-1 w-full inputOnform" type="text" name='confpsswUser'>
                    </div>

                    <div class="mt-4">
                        <label for="email">email</label>
                        <input class="block mt-1 w-full inputOnform" type="mail" name="email">
                    </div>

                    <div class="mt-4">
                        <label for="roleUser">Role du futur utilisateur</label>
                        <input class="block mt-1 w-full inputOnform" type="text" name='psswUseroleUser'>
                    </div>

                </div>

                <button class="btn_3 btn-add centerMe spaceMeTop" type='submit'>Créer l'utilisateur</button>
            </form>
        </div>
    </div>
    @endsection