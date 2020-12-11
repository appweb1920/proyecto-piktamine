@extends('Plantillas.Plantillageneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

<div class="flex h-full flex-items-center justify-center pt-2">
   
       <b class="my-7 text-4xl font-bold">
           Creacion de evento
       </b>

   </div>

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')

<h1 class="my-7 text-4xl font-bold">Crea tu evento</h1>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
 <form action="{{ route('R-submit_event') }}" method="post">
    @csrf
  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        Nombre del torneo
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Escribe el nombre del torneo" name="Nombre" required>
      <p class="text-red text-xs italic">Porfavor llena este campo.</p>
    </div>
    <div class="md:w-1/3 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
        Fecha de Inicio
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="date" name="Fechainicio" placeholder="Ingresa la fecha de cuando iniciara el evento" required>
      <p class="text-red text-xs italic pt-3">Porfavor llena este campo.</p>
    </div>
    <div class="md:w-1/3 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-dur">
        Duracion
      </label>
      <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-dur" type="number" placeholder="Escribe los dias que durara el evento" name="Duracion" min="0" max="99" pattern="[0-9]+" required>
      <p class="text-red text-xs italic">Porfavor llena este campo.</p>
      <input type="hidden" name="idUsuario" value="{{ Auth::user()->id }}">
    </div>
  </div>
  <div class="flex -mx-3 md:flex mb-6 justify-items-center justify-center">
    <button type="submit" class="bg-transparent hover:bg-gray-100 text-xl text-blue-dark font-semibold hover:text-indigo-600 py-2 px-7 mt-4 border border-blue hover:border-indigo-600 rounded">Registrar</button>
  </div>
</form>
</div>

@endsection