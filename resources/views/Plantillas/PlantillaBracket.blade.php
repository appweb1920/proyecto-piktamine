<x-app-layout>{{-- Nos trae la vista app.blade, desde el archivo app->view->components->appLAyout.php --}}

        <div class="flex flex-col md:flex-row h-screen w-screen relative">{{-- Barra lateral izq --}}

            <div class="bg-gray-800 shadow w-20 flex-grow-0">
                
                   <div class="h-45 w-20 grid grid-cols-1 gap-y-2">
                       <div class="bg-yellow-100">{{-- Item --}}
                            
                       </div>
                   </div>
                    
            </div>

            <div class="overflow-auto flex-1 flex-grow"> {{-- Area flex de contenido --}}
            
                <x-barra-header>
                    @yield('headerblancotecho')
                </x-barra-header>

            {{--@include('Plantillas.Miheader')--}}
   
              {{--@include('Plantillas.Alertas.Alerta1')--}}
              @yield('header2')
   
              <!-- INICIO ESPACIO DE TRABAJO -->
              <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 h-4/5">
              <!-- Aqui empieza el contenido pero ya con los margenes -->
          
                  <div class="px-4 py-6 sm:px-0 h-full">
                      <div class="border-4 border-dashed border-gray-600 rounded-lg h-full px-5 py-8 overflow-auto">
                      <!-- INICIO DIV CUADRO PUNTEADO -->
                          @yield('micodigo')
                      <!-- FIN DIV CUADRO PUNTEADO -->
                      </div>
                  </div>
                <!-- FIN contenido pero ya con los margenes -->
              </div>


            </div>

        </div>
</x-app-layout>
