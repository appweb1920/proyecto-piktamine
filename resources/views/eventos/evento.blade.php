@extends('Plantillas.PlantillaGeneral')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')
    
<div class="px-4 py-4 mx-auto">
            <div class="grid sm:h-24 sm:grid-flow-row sm:gap-4 sm:grid-cols-3 grid-cols-1 md:grid-cols-3">
                <div class="w-full shadow-lg flex flex-col justify-center bg-white border border-gray-300 rounded">
                    <div class="flex w-full h-full">
                       <div class="w-2/3 flex items-center justify-center ">
                            <p class="text-2xl text-center text-gray-900">Evento:</p>
                        </div>
                        <div class="w-1/3 flex items-center justify-center bg-green-500 px-8">
                            <p class="text-m font-semibold text-center text-white">{{$datosevento->Nombre}}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full shadow-lg flex flex-col justify-center bg-white border border-gray-300 rounded">
                    <div class="flex w-full h-full">
                       <div class="w-2/3 flex items-center justify-center ">
                            <p class="text-2xl text-center text-gray-900">Fecha de inicio:</p>
                        </div>
                        <div class="w-1/3 flex items-center justify-center bg-red-500">
                            <p class="text-m font-semibold text-center text-white">{{$datosevento->FechaI}}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full shadow-lg flex flex-col justify-center bg-white border border-gray-300 rounded">
                    <div class="flex w-full h-full">
                       <div class="w-2/3 flex items-center justify-center ">
                            <p class="text-2xl text-center text-gray-900">Dias de duracion:</p>
                        </div>
                        <div class="w-1/3 flex items-center justify-center bg-blue-500">
                            <p class="text-m font-semibold text-center text-white">{{$datosevento->duracion}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

{{-- Seccion de mi header --}}
@section('micodigo')

{{--<livewire:creaciondetorneos:dataevento="$datosevento">--}}
@livewire('creaciondetorneos',['dataevento' => $datosevento])

@endsection