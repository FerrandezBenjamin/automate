@extends('layouts.base')

@section('title', 'Liste des groupes')

@section('content')
<div class="allContainer">

    <div class="container">

        <div class="containerCard">
            @foreach ($allGroupe as $groupe)
            <div class="card">
                <label for="card1"></label>
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
                        <form action="groupe/join">
                            <input type="hidden" name="groupeID" value="{{$groupe->id}}" />
                            <input type="hidden" name="userID" value="{{$user->id}}" />
                            <a href="{{url('groupe/join')}}">
                                <button type="submit">Rejoindre ce groupe !</button>
                            </a>
                        </form>
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
            <span>{{$noGroupeUser->name}}</span>
            @endforeach
        </div>
    </div>




    @endsection