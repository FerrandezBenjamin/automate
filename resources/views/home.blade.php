@extends('layouts.base')

@section('title', 'Liste des groupes')

@section('content')
<div class="container">

    <div class="containerCard">
        @foreach ($allGroupe as $groupe)
        <div class="card">
            <label for="card1"></label>
            <div class="cardContainer">
                <h2> {{$groupe->name}} </h2>
                <div class="dataCard">
                    <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit
                        Itaque eos impedit doloremque possimus ea odio, similique dicta ad
                        est quae maiores officia repellendus nostrum facilis eaquNihil, quam placeat.e temporibus!
                    </span>
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



    @endsection