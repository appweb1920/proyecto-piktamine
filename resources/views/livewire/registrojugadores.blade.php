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
    
    <p>Registrar jugadores</p><br>
    <div class="flex bg-red-400 my-3 mx-1 px-1 py-2 max-w-4xl mx-auto h-40">
      <div class="bg-red-700 grid rounded grid-cols-3 gap-4 flex w-3/4 ml-3">
      
       <div class="pl-5">
           <p>Nombre:</p>
           <input wire:model="nombre" type="text">
       </div>
       <div>
           <p>Tag:*</p>
           <input wire:model="tag" type="text">
       </div>
       <div>
           <p>Sponsor:</p>
           <input wire:model="sponsor" type="text"><br>
       </div>
       
       <div class="col-span-4 flex flex-items-center justify-center">
            <button wire:click="store()" class="bg-green-400 mx-5 w-3/12 h-15 hover:text-white">Registrar jugador</button>
        </div>
        
        </div>
        <div class="flex bg-green-300 w-1/4 rounded ml-4 mr-2 items-center justify-center">
            <button wire:click="gobracket()" class="bg-green-200 w-5/6 h-5/6 rounded hover:text-white">
                Ver bracket
            </button>
        </div>
    </div>
    
    <p>Jugadores</p><br>
    
    {{$n }}
    
    <div class="bg-yellow-600 max-w-4xl mx-auto h-100">
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
    
</div>
