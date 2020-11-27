@props(['color'=>'red']) {{-- puede llevar un valor sin que afecte el dejar vacio, el atributo que madamos desde la vista principal 
Si no definimos un valor en props entonces se almacenara por defecto en 'props'
--}}
 

 <div role="alert">
  <div class="bg-{{$color}}-500 text-white font-bold rounded-t px-4 py-2">
    Danger
  </div>
  <div class="border border-t-0 border-{{$color}}-400 rounded-b bg-{{$color}}-100 px-4 py-3 text-{{$color}}-700">
    <p>Something not ideal might be happening.</p>
  </div>
</div>


{{-- Componente anonimo: osea que este archivo es solo la vista del componente, sin su clase --}}