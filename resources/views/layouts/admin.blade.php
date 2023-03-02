<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    @if ($errors->any())
                    <div class="container-error">
                        <div class="error" role="alert">
                            <p class="mb-0">{{$errors->first()}}</p>
                        </div>
                        @endif

                        @if(Session::get('message'))
                        <div class="container-great">
                            <div class="great" role="alert">
                                <p class="mb-0">{{Session::get('message')}}</p>
                            </div>
                        </div>
                        @endif

                        <div class="allContainer">
                            <div id="administration-content">
                                <div class="nav-admin">
                                    <div class="title-admin">
                                        <p>Bienvenue <b>{!! Auth::user()->name() !!}</b></p>
                                    </div>
                                    <div class="liste-gestion">
                                        <li><a href='{{route("home")}}'>Accueil</a></li>
                                        <li><a href='{{route("admin.new_groupe")}}'>Nouveau groupe</a></li>
                                        <li><a href='{{route("admin.gestion_groupe")}}'>Gestion des groupes</a></li>
                                        <li><a href='{{route("admin.gestion_user")}}'>Gestion des utilisateurs</a></li>
                                    </div>
                                </div>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>

</html>