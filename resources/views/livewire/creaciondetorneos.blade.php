<div class="mb-10 pb-10">


@if(Auth::user()->id==$idusuario)
<h1 class="my-7 text-4xl font-bold">Agregar Torneo</h1> 
   
     Hay torneos: {{$haytorneos}}

   <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 max-w-4xl mx-auto">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- The Master doesn't talk, he acts. --}}
    
    {{--@auth--}
    
    <div class="{{ $divcolor }} rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6">{{-- el valor por defecto de div color es bg-white --}}
        
        {{-- <form action="">--}}
            <div class="-mx-3 md:flex mb-6 flex-col">
               <div class="md: px-3 mb-6 md:mb-0">
                <label for="nvideojuego" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Anadir juego</label>
                <input wire:model="Nombrejuego" id="nvideojuego" placeholder="Nombre de torneo" class="block w-full bg-gray-200 px-4 py-3 rounded text-gray-700 focus:bg-gray-100 focus:outline-none border border-gray-200 focus:border-gray-500" type="text">
                {{--
                <select name="nvideojuego" id="nvideojuego">
                    <option wire:click="setNJ('j1')" value="j1">Smash ultimate</option>
                    <option wire:click="setNJ('j2')" value="j2">Smash Melee</option>
                    <option wire:click="setNJ('per')" value="per">Personalizado</option>
                </select>
                --}}
                </div> 
                
                <div class="md:w-full px-3 mb-6 mt-4 md:mb-0">      
                <label for="formato" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Formato</label>
                <input wire:model="Formato" id="formato" placeholder="Nombre de torneo" class="block w-full bg-gray-200 px-4 py-3 rounded text-gray-700 focus:bg-gray-100 focus:outline-none border border-gray-200 focus:border-gray-500" type="text">
                {{--
                <select name="nvideojuego" id="nvideojuego">
                    <option wire:click="setF('se')" value="se">Single elimination</option>
                    <option wire:click="setF('de')" value="de">Double elimination</option>
                </select><br><br>
                --}}
                </div>
        </div>
        <div class="flex -mx-3 md:flex mb-6 justify-items-center justify-center">
            <button wire:click="store" class="bg-transparent hover:bg-gray-100 text-xl text-blue-dark font-semibold hover:text-indigo-600 py-2 px-7 mt-4 border border-indigo hover:border-indigo-600 rounded">Agregar</button>
        </div>
    
        {{--</form>--}}
    </div>
    {{--@endauth--}}
    <h1 class="my-7 text-4xl font-bold">Mis Torneos</h1>
    
    <div class="{{ $divcolor }} rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 mt-5">{{-- el valor por defecto de div color es bg-white --}}
    
       @if($haytorneos)
       
        @foreach($mistorneos as $ti)
                  
           <div class="flex bg-gray-300 mx-2 my-3 rounded p-2 shadow"> 
           <div class="w-1/2">  
              <p class="ml-3 mt-2 text-lg capitalize">Torneo</p><br> 
               <div class="float-left top-0 right-0 m-3">
                   <div class="text-left text-sm">Juego:</div>
                   <div class="text-left text-xl">{{ $ti->Nombrejuego }} </div>
               </div> 
               <div class="float-left top-0 right-0 m-3">
                   <div class="text-left text-sm">Tipo:</div>
                   <div class="text-left text-xl">{{ $ti->Formato }}</div>
               </div> 
           </div> 
           
           <div class="flex w-1/2 flex-row-reverse mb-3">
               <button wire:click="delete({{$ti->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded mt-3 ml-2 fill-current shadow">Eliminar</button>
               <button wire:click="gobracket({{$ti->idEvento}},{{$ti->id}})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold px-4 py-2 rounded mt-3 ml-2 fill-current shadow">Ver bracket</button>
               <button wire:click="gotourney({{$ti->id}},{{$ti->idEvento}})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold px-4 py-2 rounded mt-3 fill-current shadow">Gestionar</button>
           </div>
           
           </div> 
            
        @endforeach
        
        @else
            
            <div class="w-50 h-50 my-1">No hay Torneos disponibles aun</div>
        
        @endif
        
    
    </div>
@endif    
    
    <h1 class="my-7 text-4xl font-bold">Torneos en este evento</h1>
    
        <div class="{{ $divcolor }} rounded-lg shadow overflow-hidden max-w-4xl mx-auto p-4 mb-6 mt-5">{{-- el valor por defecto de div color es bg-white --}}
    
       @if($haytorneos)
       
        @foreach($datost as $ti)
                  
           <div class="flex bg-gray-300 mx-2 my-3 rounded p-2 shadow"> 
           <div class="w-1/2">  
              <p class="ml-3 mt-2 text-lg capitalize">Torneo</p><br> 
               <div class="float-left top-0 right-0 m-3">
                   <div class="text-left text-sm">Juego:</div>
                   <div class="text-left text-xl">{{ $ti->Nombrejuego }} </div>
               </div> 
               <div class="float-left top-0 right-0 m-3">
                   <div class="text-left text-sm">Tipo:</div>
                   <div class="text-left text-xl">{{ $ti->Formato }}</div>
               </div> 
           </div> 
           
           <div class="flex w-1/2 flex-row-reverse mb-3">
               <button wire:click="gobracket({{$ti->idEvento}},{{$ti->id}})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold px-4 py-2 rounded mt-3 ml-2 fill-current shadow">Ver bracket</button>
               <button wire:click="gotourney({{$ti->id}},{{$ti->idEvento}})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold px-4 py-2 rounded mt-3 fill-current shadow">Ir al torneo</button>
           </div>
           
           </div> 
            
        @endforeach
        
        @else
            
            <div class="w-50 h-50 my-1">No hay Torneos disponibles aun</div>
        
        @endif 
    
    </div>
    
</div>
</div>
