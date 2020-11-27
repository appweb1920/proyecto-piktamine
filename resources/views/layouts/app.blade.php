<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> {{-- Saca la informacion del lenguaje segun nuestro archivo de configuracion de la carpeta: config->App --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title> {{-- Va a configurar el valor del nombre para ponerlo en el .env --}}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>{{-- alphine para trabajar con js, el valor defer hace como si los escripts estuvieran hasta el final del body--}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown') {{-- esta es la navbar superior!!, LLAMA A UN COMPONENTE DE LIVEWIRE, osea va arenderizar una vista pero con livewire --}}

            <!-- Page Content -->
            <main>
                {{ $slot }} {{-- ESTO ES UN SLOT NORMAL!!!!! --}}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
