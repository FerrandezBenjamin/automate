@extends('layouts.admin')

@section('title', 'Gestion des Roles')


@section('content')

<div class="containerGestion">
    <div class="titlePage">
        <h2>Gestion des Roles</h2>
    </div>

    <div class="containerOnAdmin">
        <span class="titleOnContainerAdmin">Vue sur les Roles


            <a class="btn_3 btn-add absoluteRight" role="button" href="{{url("/admin/create_role")}}"><i class="fas fa-plus fa-sm text-white-50"></i>Créer un rôle</a>


        </span>

        <table class="tableGroupe">
            <thead>
                <tr>
                    <th>ID Role</th>
                    <th>Nom du role</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allRoles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <form action="{{url("/admin/delete_role")}}" method="POST">
                            @csrf
                            <input type="hidden" name="roleID" value="{{$role->id}}" />
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