@extends('layouts.admin')

@section('title', 'Liste des groupes')

@section('content')

<div class="containerGestion">
    <div class="titlePage">
        <h2>Gestion des groupes</h2>
    </div>
    <div class="containerOnAdmin">
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
</div>

@endsection