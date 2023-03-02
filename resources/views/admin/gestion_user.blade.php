@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs')


@section('content')

<div class="containerGestion">
    <div class="titlePage">
        <h2>Gestion des utilisateurs</h2>
    </div>
    <div class="containerOnAdmin">
        <span class="titleOnContainerAdmin">Vue sur utilisateurs</span>
        <table class="tableGroupe">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nom de son groupe</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUser as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    @if($user->groupe !== null)
                    <td>{!! $user->groupe->name !!}</td>
                    @else
                    <td>Pas de groupe</td>
                    @endif
                    <td>
                        <form action="{{url("/admin/delete_user")}}" method="POST">
                            @csrf
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <button class="btn_2 btn-quit-2" type="submit">Supprimer !</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection