<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> {{-- Saca la informacion del lenguaje segun nuestro archivo de configuracion de la carpeta: config->App --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title> {{-- Va a configurar el valor del nombre para ponerlo en el .env --}}
        
        <link rel="stylesheet" href="{{ asset('plugins/jquery-bracket-master/dist/jquery.bracket.min.css') }}"/>
        
        {{--
        <link rel="stylesheet" href="{{ asset('plugins/jQuery-Bracket-World/dist/assets/styles/jquery.bracket-world.min.css') }}"/>--}}
        
        
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>{{-- alphine para trabajar con js, el valor defer hace como si los escripts estuvieran hasta el final del body--}}
    </head>
    <body class="antialiased font-sans bg-gray-200">
        <div class="min-h-full leading-normal tracking-normal">
            @livewire('navigation-dropdown') {{-- esta es la navbar superior!!, LLAMA A UN COMPONENTE DE LIVEWIRE, osea va arenderizar una vista pero con livewire --}}

            <!-- Page Content -->
            
                {{ $slot }} {{-- ESTO ES UN SLOT NORMAL!!!!! --}}
        </div>

        @stack('modals')

        @livewireScripts

    </body>
</html>
