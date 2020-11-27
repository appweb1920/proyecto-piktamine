<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- TAILWIND!! -->
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        @livewireStyles
        
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>{{-- alphine para trabajar con js, el valor defer hace como si los escripts estuvieran hasta el final del body--}}
    </head>
    
<body>
        
        {{-- Prueba codigo --}}
        
        <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
      <!-- INICIO PRIMER BARRA SUPERIOR  -->
      @include('Plantillas.MiNavbar')
      <!-- FIN PRIMER BARRA SUPERIOR  -->
  
      @include('Plantillas.Miheader')
  
          <main> {{-- APARTIR DE AQUI VA NUESTRO CODIGO --}}
   
              @include('Plantillas.Alertas.Alerta1')
   
              <!-- INICIO ESPACIO DE TRABAJO -->
              <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
              <!-- Aqui empieza el contenido pero ya con los margenes -->
          
                  <div class="px-4 py-6 sm:px-0">
                      <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
                      <!-- INICIO DIV CUADRO PUNTEADO -->
                          @yield('micodigo')
                      <!-- FIN DIV CUADRO PUNTEADO -->
                      </div>
                  </div>
                <!-- FIN contenido pero ya con los margenes -->
            </div>
            <!-- FIN DIV ESPACIO DE TRABAJO -->
    
        </main>
    </div>
     
     @stack('modals')
      
    @livewireScripts    
</body>
</html>
