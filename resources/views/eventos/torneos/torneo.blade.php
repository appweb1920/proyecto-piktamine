@extends('Plantillas.Plantillageneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

Soy el header Torneo

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')

{{--<livewire:creaciondetorneos:dataevento="$datosevento">--}}
@livewire('registrojugadores',['datatorneo' => $datost,'id_event' => $id_event])


@endsection