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

   <x-alert color="blue" class="mb-4">
        <x-slot name="title">
            ¡Aviso!
        </x-slot>  
            ¡Por el momento solo es posible visualizar el bracket!
    </x-alert>
    
    
    <div class="demo">{{-- Aqui va a escribir todo el arbol --}}
   </div>
   
  
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

    
var singleElimination = {
    
  "teams": [              // Matchups
    @for($i = 1; $i <= $total; $i++)
      
        @if($i<$total)
            ["{{ $datosj1[$i-1]->Tag }}", "{{ $datosj2[$i-1]->Tag }}" ],
        @elseif($i==$total)
            ["{{ $datosj1[$i-1]->Tag }}", "{{ $datosj2[$i-1]->Tag }}" ]
        @endif
      
      @endfor
  ],
  "results": [            // List of brackets (single elimination, so only one bracket)
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
  ]
}

$('.demo').bracket({
  init: singleElimination
});
    
</script>

@else

<div>No se puede crear el torneo,el num de jugadores no es potencia de 2</div>

@endif                       

</div>
