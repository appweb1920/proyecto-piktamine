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
    
    @include('Plantillas.Alertas.alphineNotifyArriba')
    
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
            <button wire:click="store()" class="bg-transparent w-6/12 h-15 hover:bg-gray-100 text-blue-dark font-semibold hover:text-indigo-600 border border-indigo hover:border-indigo-600 rounded my-5" x-data="{}"
            @click="$dispatch('notice', {type: 'success', text: 'Jugador registrado con exito'})">Registrar jugador</button>
        </div>
        
        </div>
        <div class="flex bg-white w-1/4 rounded ml-4 mr-2 items-center justify-center">
           
           @if($npartidasiniciales==4 || $npartidasiniciales==8 || $npartidasiniciales==16 || $npartidasiniciales==32)
               <button wire:click="gobracket()" class="bg-indigo-500 w-5/6 h-5/6 rounded hover:bg-indigo-700 text-white font-bold rounded fill-current shadow">
                Ver bracket
            </button>
           @else
               <button class="bg-indigo-500 w-5/6 h-5/6 rounded hover:bg-indigo-700 text-white font-bold rounded fill-current shadow" x-data="{}"
                @click="$dispatch('notice', {type: 'warning', text: 'El numero de partidas iniciales debe ser 4,8,16 o 32 para poder generar el bracket'})">
                Ver bracket
               </button>
           @endif
        
        </div>
    </div>
    
    @endif
    
    <h1 class="my-7 text-4xl font-bold">Informacion</h1>
    <div class="grid grid-cols-2 grid-flow-col grid-rows-2 bg-white max-w-4xl mx-auto h-60 rounded-lg">
        <div class="border-solid border-4 shadow p-5">
            <p class="text-left text-sm">Num de participantes:</p><p class="text-left text-xl">{{ $nparticipantes }}</p> </div>
        <div class="border-solid border-4 shadow p-5">
            <p class="text-left text-sm">Num de partidas iniciales:</p><p class="text-left text-xl">{{$npartidasiniciales}}</p></div>
        <div class="border-solid border-4 shadow p-5">
            <p class="text-left text-sm">Capacidad:</p><p class="text-left text-xl">{{ $capacidad }}</p></div>
            @if(Auth::user()->id==$idusuario)
        <div class="grid grid-cols-2 shadow border-solid border-4">
            <button wire:click="gobracket()" class="bg-indigo-600 m-4 rounded text-white hover:bg-indigo-800 font-bold">ver bracket</button>
            <button wire:click="reiniciartodo()" class="bg-red-600 m-4 rounded text-white hover:bg-red-800 font-bold" x-data="{}"
                x-on:click="$dispatch('notice', {type: 'danger', text: 'Datos borrados con exito'})">reiniciarbracket</button>
        </div>
        @else
            <div class="grid grid-cols-1 shadow border-solid border-4">
            @if($npartidasiniciales==4 || $npartidasiniciales==8 || $npartidasiniciales==16 || $npartidasiniciales==32)
            
                <button wire:click="gobracket()" class="bg-indigo-600 m-4 rounded text-white hover:bg-indigo-800 font-bold">ver bracket</button>
            
            @else
            
                <button class="bg-indigo-600 m-4 rounded text-white hover:bg-indigo-800 font-bold" x-data="{}"
                @click="$dispatch('notice', {type: 'warning', text: 'El numero de partidas iniciales debe ser 4,8,16 o 32 para poder generar el bracket'})">ver bracket</button>
            
            @endif
        
        </div>
        @endif
    </div>
    
    <h1 class="my-7 text-4xl font-bold">Participantes</h1>
    
    @if($haydatos)
    <div class="bg-white max-w-4xl mx-auto h-100">
        <div class="bg-white relative w-full h-full py-6">
            <div class="overflow-auto h-11/12">
                @foreach($datosj as $index => $d)
                    <div class="grid bg-gray-200 my-1 mx-6 px-4 py-2 rounded grid-cols-4 gap-1">
                      <div>
                          {{$index + 1}}
                      </div>
                       <div>
                          <p class="text-left text-xs">Nombre</p>
                          <p class="text-left text-xl">{{$d->Nombre}}</p>
                       </div>
                       <div>
                          <p class="text-left text-xs">Tag</p>
                           <p class="text-left text-xl">{{$d->Tag}}</p>
                       </div>
                       <div>
                           <p class="text-left text-xs">Sponsor</p>
                            <p class="text-left text-xl">{{$d->Sponsor}}</p>
                       </div>
                       {{--
                       <div>
                           <button wire:click="delete({{$d->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded mt-3 ml-2">Eliminar</button>
                       </div>
                       --}}
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
    @include('Plantillas.Alertas.alphineNotifyAbajo')
    
</div>
