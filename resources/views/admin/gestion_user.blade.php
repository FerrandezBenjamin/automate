@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs')


@section('content')

<div class="containerGestion">
    <div class="titlePage">
        <h2>Gestion des utilisateurs</h2>
    </div>
    <div class="containerOnAdmin">
        <span class="titleOnContainerAdmin">Vue sur utilisateurs
            <a class="btn_3 btn-add absoluteRight" role="button" href="{{url("/admin/create_user_view")}}"><i class="fas fa-plus fa-sm text-white-50"></i>Créer un utilisateur</a></span>
        <table class="tableGroupe">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Groupe</th>
                    <th>Modifier le groupe</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allUsers as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <form action="{{url("/admin/assign_groupe")}}" method="POST">
                            @csrf
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <select name="groupeID" class="selectGroupe">
                                <option value="" disabled selected hidden>Selectionner un groupe :</option>
                                <option value="">Pas de groupe</option>
                                @foreach($allGroupes as $groupe)
                                @if($user->groupe !== null)
                                <option value="{{$groupe->id}}" {!! $groupe->id == $user->groupe->id ? 'selected' : '' !!}>{{$groupe->name}}</option>
                                @else
                                <option value="{{$groupe->id}}">{{$groupe->name}}</option>
                                @endif
                                @endforeach
                            </select>

                    </td>

                    <td>
                        <button class="btn_2 btn-join" type="submit">Modifier</button>
                        </form>
                    </td>


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