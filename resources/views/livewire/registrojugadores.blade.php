<div class="pb-6">
    {{-- Stop trying to control. --}}
    @if($aviso==true)
        
       <x-alert color="red" class="mb-4">
           <x-slot name="title">
            Advertencia
           </x-slot>  
            Has alcanzado el limite de jugadores
       </x-alert>
        
    @endif
    
    @if(Auth::user()->id==$idusuario) {{-- solo el usuario propietario puede registra jugadores a su mismo torneo --}}
    
    <h1 class="my-7 text-4xl font-bold">Resgistro de jugadores</h1>
    <div class="flex bg-white my-3 mx-1 px-1 py-2 max-w-4xl mx-auto h-50 rounded-lg">
      <div class="bg-white grid rounded grid-cols-3 gap-x-4 flex w-3/4 ml-3">
      
       <div class="pl-5 h-20">
           <p>Nombre:</p>
           <input class="appearance-none block w-full h-6/12 bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" wire:model="nombre" type="text">
       </div>
       <div class="h-20">
           <p>Tag:*</p>
           <input class="appearance-none block w-full h-6/12 bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" wire:model="tag" type="text">
       </div>
       <div class="h-20">
           <p>Sponsor:</p>
           <input class="appearance-none block w-full h-6/12 bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" wire:model="sponsor" type="text"><br>
       </div>
       
       <div class="col-span-3 flex flex-items-center justify-center">
            <button wire:click="store()" class="bg-transparent w-6/12 h-15 hover:bg-gray-100 text-blue-dark font-semibold hover:text-indigo-600 border border-indigo hover:border-indigo-600 rounded my-5">Registrar jugador</button>
        </div>
        
        </div>
        <div class="flex bg-white w-1/4 rounded ml-4 mr-2 items-center justify-center">
            <button wire:click="gobracket()" class="bg-indigo-500 w-5/6 h-5/6 rounded hover:bg-indigo-700 text-white font-bold rounded fill-current shadow">
                Ver bracket
            </button>
        </div>
    </div>
    
    @endif
    
    <h1 class="my-7 text-4xl font-bold">Informacion</h1>
        <div>n participantes</div>
        <div>n partidas iniciales</div>
        <div>Capacidad</div>
        <div>ver bracket</div>
    <div class="bg-yellow-600 max-w-4xl mx-auto h-100">
    
    </div>
    
    <h1 class="my-7 text-4xl font-bold">Participantes</h1>
    
    {{$n}}
    
    @if($haydatos==true)
    <div class="bg-white max-w-4xl mx-auto h-100">
        <div class="bg-yellow-300 relative w-full h-full">
            <div class="overflow-auto h-11/12">
                @foreach($datosj as $index => $d)
                    <div class="grid bg-red-400 my-3 mx-1 px-1 py-2 rounded grid-cols-5 gap-4">
                      <div>
                          {{$index + 1}}
                      </div>
                       <div>
                          <p>Nombre</p>
                           {{$d->Nombre}}
                       </div>
                       <div>
                          <p>Tag</p>
                           {{$d->Tag}}
                       </div>
                       <div>
                           <p>Sponsor</p>
                            {{$d->Sponsor}}
                       </div>
                       <div>
                           <button wire:click="delete({{$d->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded mt-3 ml-2">Eliminar</button>
                       </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
        <div class="bg-white max-w-4xl mx-auto h-100">
            No hay participantes registrados
        </div>
    @endif
    
</div>
