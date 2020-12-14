@extends('Plantillas.PlantillaBracket')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

<div class="flex h-full flex-items-center justify-center pt-2">
   
       <b class="my-7 text-4xl font-bold">
           Bracket
       </b>

</div>

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')



{{--<livewire:creaciondetorneos:dataevento="$datosevento">--}}
@livewire('bracketindividual',['databracket' => $datosb,'idtorneo'=>$id_torneo])

@endsection