<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="5" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .card-body {
            overflow-y: scroll;
            height: 350px;
            overflow: auto;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="app">
        <v-toolbar fixed color="white">
            <v-toolbar-title>Bengkel Mesin</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                    @guest
                        <v-btn text href="{{ route('login') }}">Login</v-btn>
                        <v-btn text href="{{ route('register') }}">Register</v-btn>
                    @else
                        <v-btn text href="{{route('chat')}}"> Group</v-btn>
                        <v-btn text href="{{route('video_chat')}}">Video Private</v-btn>
                        <v-btn text> {{ Auth::user()->name }}</v-btn>
                        <v-btn text href="{{route('home')}}">Kembali</v-btn>
                    @endguest
                    <form ref="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </v-toolbar-items>
        </v-toolbar>

        <main class="mt-5">
            <v-container fluid>
                @yield('content')
            </v-container>
        </main>
    </div>
</body>
</html>
