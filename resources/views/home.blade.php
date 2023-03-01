@extends('layouts.base')

@section('title', 'Liste des groupes')

@section('content')
<div class="allContainer">

    <div class="container">

        <div class="containerCard">
            @foreach ($allGroupe as $groupe)
            <div class="card">
                <div class="cardContainer">
                    <h2> {{$groupe->name}} </h2>
                    <div class="dataCard">
                        @foreach($groupe->userInGroupe as $userInGroupe)
                            @if($userInGroupe->name == $user->name)
                                <p style="color:blue">{{$userInGroupe->name}}</p>
                            @else
                                <p>{{$userInGroupe->name}}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="join">
                        @if($user->groupe_id == $groupe->id)
                        <form action="groupe/quit">
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <input type="hidden" name="groupeID" value="{{$groupe->id}}" />
                            <a class="quit" href="{{url('groupe/quit')}}">
                                <button type="submit" class="btn btn-quit">Quitter !</button>
                            </a>
                        </form>
                        @else
                        <form action="groupe/join">
                            <input type="hidden" name="groupeID" value="{{$groupe->id}}" />
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <a class="join" href="{{url('groupe/join')}}">
                                <button type="submit" class="btn btn-join">Rejoindre ce groupe !</button>
                            </a>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="containerNoGroupe">

        <h2>Liste des personnes sans groupe</h2>
        <div class="containerInNoGroupe">
            @foreach($userWithoutGroupe as $noGroupeUser)
            @if($noGroupeUser->name == $user->name)
            <p style="color:blue">{{$noGroupeUser->name}}</p>
            @else
            <p>{{$noGroupeUser->name}}</p>
            @endif

            @endforeach
        </div>
    </div>




    @endsection