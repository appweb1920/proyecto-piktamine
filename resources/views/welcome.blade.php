@extends('Plantillas.PlantillaGeneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

<div class="grid grid-cols-1 grid-flow-row flex justify-center justify-items-center">

<div class="mb-3 mt-2">
<b class="text-4xl font-bold">Bienvenido</b>
<br>
</div>

<div>
<a href="{{ route('R-events') }}">
<button class="bg-transparent hover:bg-gray-100 text-blue-dark font-semibold hover:text-indigo-600 py-2 px-4 border border-blue hover:border-indigo-600 rounded">
    EXPLORAR EVENTO
</button></a>

<a href="{{ route('R-create_event') }}"><!-- component -->
<button class="bg-transparent hover:bg-gray-100 text-blue-dark font-semibold hover:text-indigo-600 py-2 px-4 border border-blue hover:border-indigo-600 rounded">
    ORGANIZAR EVENTO
</button></a>
</div>

</div>

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')

    @auth
        <h1 class="my-7 text-4xl font-bold">Mis Eventos:</h1>
    
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
    
    @else
          <div class="h-full flex-items-center justify-center flex-col items-center mt-8">
           <div class="flex flex-items-center justify-center flex-col items-center bg-white px-2 py-6 rounded-lg shadow">
                <h2 class="text-3xl font-semibold text-gray-800 md:text-6xl">JETTOURNAMENT <br>
                <span class="flex text-indigo-600 text-2xl justify-center">Organiza tu torneo de e-sport</span></h2>
                <p class="flex mt-2 text-sm text-gray-500 md:text-base py-5 px-7 justify-center text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quo, omnis vitae veritatis laudantium obcaecati. Explicabo, delectus similique aliquam, officia aperiam cumque et illum modi molestiae ex facilis hic eum!</p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a href="{{ route('R-create_event') }}"><!-- component -->
                        <button class="bg-transparent hover:bg-gray-100 text-blue-dark font-semibold hover:text-indigo-600 py-2 px-7 border border-blue hover:border-indigo-600 rounded text-2xl">
                            Comenzar
                        </button></a>
                </div>
            </div>
            </div>
    @endauth


@endsection