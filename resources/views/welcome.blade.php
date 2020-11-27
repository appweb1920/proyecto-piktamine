<x-app-layout>{{-- Nos trae la vista app.blade, desde el archivo app->view->components->appLAyout.php --}}

@include('Plantillas.Miheader')
   
              {{--@include('Plantillas.Alertas.Alerta1')--}}
   
              <!-- INICIO ESPACIO DE TRABAJO -->
              <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
              <!-- Aqui empieza el contenido pero ya con los margenes -->
          
                  <div class="px-4 py-6 sm:px-0">
                      <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
                      <!-- INICIO DIV CUADRO PUNTEADO -->
                          {{--@yield('micodigo') --}}
                          
                          
                          
                      <!-- FIN DIV CUADRO PUNTEADO -->
                      </div>
                  </div>
                <!-- FIN contenido pero ya con los margenes -->
            </div>

</x-app-layout>

