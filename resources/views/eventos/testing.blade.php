@extends('Plantillas.PlantillaBracket')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

Testeo

@endsection
  
{{-- Seccion de mi header --}}
@section('micodigo')  
   
   <div class="demo"></div>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

{{--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
--}}
{{--
<script src="{{ asset('plugins/jQuery-Bracket-World/dist/assets/scripts/jquery.bracket-world.min.js') }}"></script> 
    --}}
    
<script src="{{ asset('plugins/jquery-bracket-master/dist/jquery.bracket.min.js') }}"></script>            
            
<script>  

var singleElimination = {
  "teams": [              // Matchups
    ["Team 1", "Team 2"], // First match
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"],
    ["Team 3", "Team 4"], 
      
  ],
  "results": [            // List of brackets (single elimination, so only one bracket)
    [                     // List of rounds in bracket
      [                   // First round in this bracket
        [0, 0],           // Team 1 vs Team 2
        [0, 0]            // Team 3 vs Team 4
      ],
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
    
@endsection