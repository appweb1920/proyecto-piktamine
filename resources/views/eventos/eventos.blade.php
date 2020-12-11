@extends('Plantillas.Plantillageneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

   <div class="flex h-full flex-items-center justify-center pt-2">
   
       <b class="my-7 text-4xl font-bold">
           Explorar
       </b>

   </div>

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')
    
    <h1 class="my-7 text-4xl font-bold">Eventos creados:</h1>
   
   <div class="flex w-full pr-9 flex-col">
    
    @foreach($datosevento as $d)
    
      <div class="flex-none m-5 relative rounded bg-gray-200 shadow w-full">

          <button class="bg-green-500 pl-10 pr-10 pt-8 pb-8 ml-3 absolute top-0 -mt-4 -mr-4 rounded text-white fill-current shadow hover:bg-green-600 hover:text-gray-200" onclick="window.location='/event/{{ $d->id}}'" type="button">
          <b class="bold">Ir al evento</b>
          </button>


      <div class="float-right top-0 right-0 m-3">
          <div class="text-right text-sm">Duracion</div>
          <div class="text-right text-2xl"> {{$d->duracion}} dias </div>
      </div>
      <div class="float-right top-0 right-0 m-3">
          <div class="text-right text-sm">Fecha de inicio</div>
          <div class="text-right text-2xl"> {{$d->FechaI}} </div>
      </div>
      <div class="float-right top-0 right-0 m-3">
          <div class="text-right text-sm">Zona horaria</div>
          <div class="text-right text-2xl"> {{$d->ZonaH}} </div>
      </div>
      <div class="float-right top-0 right-0 m-3">
          <div class="text-right text-sm">Nombre</div>
          <div class="text-right text-2xl"> {{$d->Nombre}} </div>
      </div>
  </div>
    
    @endforeach
    
</div>

@endsection