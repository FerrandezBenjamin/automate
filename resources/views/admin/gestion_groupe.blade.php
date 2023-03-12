@extends('layouts.admin')

@section('title', 'Liste des groupes')

@section('content')

<div class="containerGestion">
    <div class="titlePage">
        <h2>Gestion des groupes</h2>
    </div>

    <div class="containerOnAdmin separateContainerAdmin">
        <div class='oneContainerAdmin'>
            <span class="titleOnContainerAdmin">Vue sur les groupes</span>
            <table class="tableGroupe">
                <thead>
                    <tr>
                        <th>Nom du groupe</th>
                        <th>Nb d'utilisateurs</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allGroupes as $groupe)
                    <tr>
                        <td>{{$groupe->name}}</td>
                        <td>{!! $groupe->userInGroupe->count() !!}</td>
                        <td>
                            <form action="{{url("/admin/delete_groupe")}}" method="POST">
                                @csrf
                                <input type="hidden" name="groupeID" value="{{$groupe->id}}" />
                                <button class="btn_2 btn-quit-2" type="submit">Supprimer !</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
         <div class='oneContainerAdmin'>
            <span class="titleOnContainerAdmin">Demande à rejoindre un groupe</span>
                <table class="tableGroupe">
                    <thead>
                            <th>Nom utilisateur</th>
                            <th>Demande de groupe :</th>
                            <th>Accepter/refuser</th>
                    </thead>
                    <tbody>
                        @foreach($allAsk as $askgroupe)
                        <form action="{{url("/admin/response_assign")}}" method="POST">
                            @csrf
                            <input type="hidden" name="askID" value="{{$askgroupe->id}}" />
                            <input type="hidden" name="userID" value="{{$askgroupe->user_id}}" />
                            <input type="hidden" name="groupeID" value="{{$askgroupe->groupe_id}}" />
                            <tr>
                                <td>{{$askgroupe->nameUser->name}}
                                <td>{{$askgroupe->nameGroupe->name}}
                                <td>
                                    <button class="btn_2 btn-join" type="submit" name="action" value="accepted">Accepter</button>
                                    <button class="btn_2 btn-quit-2" type="submit" name="action" value="refuse">Refuser</button>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection