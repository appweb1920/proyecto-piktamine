@extends('Plantillas.PlantillaGeneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

    Soy el evento {{$datosevento->id}}

    Informacion:

    Evento: <br>
    {{$datosevento->Nombre}} <br>

    Fecha de inicio: <br>
    {{$datosevento->FechaI}} <br> 

    Dias de duracion: <br>
    {{$datosevento->Duracion}} <br>


@endsection

{{-- Seccion de mi header --}}
    @section('micodigo')

{{--<livewire:creaciondetorneos:dataevento="$datosevento">--}}
@livewire('creaciondetorneos',['dataevento' => $datosevento])

@endsection