@extends('Plantillas.PlantillaBracket')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

Soy el header Bracket individual

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')

{{--<livewire:creaciondetorneos:dataevento="$datosevento">--}}
@livewire('bracketindividual',['databracket' => $datosb,'idtorneo'=>$id_torneo])

@endsection