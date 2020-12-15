<div> 
   @php
   
       $temp=1;
       $esp2=false;
       
       $bin = decbin($total);//funcion que chaca si un num es potencia de 2
        if (preg_match('/^0*10*$/', $bin)) {
            $esp2=true;
        }
        
        
        if($total==1){ //estos ifs son para num valido para hacer la cantidad de rondas
            $nfases=1;
        }elseif($total==2){
            $nfases=2;
        }else{
            $temp=sqrt($total);
            if($temp==2||$temp==4){
                $nfases=$temp;
            }
        }
   
@endphp
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    
<style>
    @media screen and (-webkit-min-device-pixel-ratio: 0) {
     
        input[type="range"]::-webkit-slider-thumb {
            width: 15px;
            -webkit-appearance: none;
  			appearance: none;
            height: 15px;
            cursor: ew-resize;
            background: #FFF;
            box-shadow: -405px 0 0 400px #605E5C;
            border-radius: 50%;
            
        }
    }
</style>    

@section('header2')

<div class="bg-gray-200 grid h-40 w-full shadow rounded-lg grid-cols-1 gap-x-2 mb-6 mx-auto">
        <div class="flex bg-gray-300 justify-center rounded-lg text-center p-6">
           <p><b>Instruccines: </b><br><br>
            Puedes hacer click en la parte de puntuacion de cada combate para actualizar el resultado, tambien puedes cambiar el nombre del jugador
            </p>
        </div>
   </div>
@endsection

{{--
@section('header2')

<div class="bg-gray-200 grid h-60 w-full shadow rounded-lg grid-cols-2 gap-x-2 mb-6 mx-auto">
        <div class="flex bg-gray-300 justify-center rounded-lg text-center p-6">
           <p><b>Instruccines: </b><br><br>
            Puedes hacer click en la parte de puntuacion de cada combate para actualizar el resultado, tambien puedes cambiar el nombre del jugador
            </p>
        </div>
        <div class="bg-red-400 grid grid-cols-1 grid-row-5 flex w-full">
            <p class="flex bg-red-200 justify-center">Parametros ajustables</p>
            <div class="bg-blue-400 flex bg-red-200 justify-center items-center"><p>Tamano jugador <br>
             <input class="rounded-lg overflow-hidden appearance-none bg-gray-400 h-3 w-128" wire:model="valor1" type="range" min="1" max="100" step="1" value="1"/> 
             </p>  
            </div>
            <div class="flex bg-red-200 justify-center">Tamano puntuacion</div>
            <div class="flex bg-red-200 justify-center">Distancia entre combates</div>
            <div class="flex bg-red-200 justify-center">Distancia entre rondas</div>
        </div>
   </div>

@endsection

--}}   

    
   {{-- Aqui va a escribir todo el arbol --}}
   <div class="demo"></div>
  
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/jquery-bracket-master/dist/jquery.bracket.min.js') }}"></script> 
    
@if($esp2==true&&$total!=0&&$total!=1)
    <script>
    
    
    {{--
    @foreach($datab as $index => $b)
      
        @if(($index+1)<=$total-1)
            ["{{ $b->idOp1 }}", "{{ $b->idOp2 }}" ],
        @elseif(($index+1)==$total)
            ["{{ $b->idOp1 }}", "{{ $b->idOp2 }}" ]
        @endif
      
      @endforeach
      --}}

    
var saveData = { {{-- single elimination--}}
    
  "teams": [              // Matchups
    @for($i = 1; $i <= $total; $i++)
      
        @if($i<$total)
            ["{{ $datosj1[$i-1]->Tag }}", "{{ $datosj2[$i-1]->Tag }}" ],
        @elseif($i==$total)
            ["{{ $datosj1[$i-1]->Tag }}", "{{ $datosj2[$i-1]->Tag }}" ]
        @endif
      
      @endfor
  ],
    {{----}}
  "results": [
      {{--    // List of brackets (single elimination, so only one bracket)
    [  
    @for($r = 1; $r < $nfases+1; $r++ )    // List of rounds in bracket
      [                   // First round in this bracket
        @for($in = 1; $in <= $totaltemp; $in++ )
            @if(($in)<($totaltemp))
                [{{$datosj1[$in-1]->Res1}},{{$datosj1[$in-1]->Res2}}],           // Team 1 vs Team 2
            @elseif(($in)==$totaltemp)
                [{{$datosj1[$in-1]->Res1}},{{$datosj1[$in-1]->Res2}}]
            @endif
        @endfor
      ],
          {{$totaltemp=($totaltemp/2)}}
    @endfor  
      [                   // Second (final) round in single elimination bracket
        [, ],           // Match for first place
        [, ]            // Match for 3rd place
      ]
    ]
    --}}
  ]
}

function saveFn(data, userData) { {{-- No entiendo como puedo usar el formato de los datos de este json en mi bd --}}
  var json = jQuery.toJSON(data)
  $('#saveOutput').text(json)
  /* You probably want to do something like this
  jQuery.ajax("rest/"+userData, {contentType: 'application/json',
                                dataType: 'json',
                                type: 'post',
                                data: json})
  */
}
 
$(function() {
    var container = $('.demo')
    container.bracket({
      teamWidth: 60,
      scoreWidth: 20,
      matchMargin: 10, 
      roundMargin: 50,
      init: saveData,
      save: saveFn,
      userData: "http://myapi"}) {{-- no se exactamenten como utilizar este parametro con este plugin --}}
 
    /* You can also inquiry the current data */
    var data = container.bracket('data')
    $('#dataOutput').text(jQuery.toJSON(data))
  })
                 
</script>

@else

<div>No se puede crear el torneo,el num de jugadores no es potencia de 2</div>

@endif                       

</div>
