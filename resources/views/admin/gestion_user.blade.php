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
                @foreach ($allUsers as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <form action="{{url("/admin/assign_groupe")}}" method="POST">
                            @csrf
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <select name="groupeID" class="selectGroupe">
                                @foreach($allGroupes as $groupe)
                                @if($user->groupe !== null)
                                <option value="{{$groupe->id}}" {!! $groupe->id == $user->groupe->id ? 'selected' : '' !!}>{{$groupe->name}}</option>
                                @else
                                <option value="{{$groupe->id}}">{{$groupe->name}}</option>
                                @endif
                                @endforeach
                            </select>
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