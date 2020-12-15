@extends('Plantillas.PlantillaBracket')

{{-- Seccion del header para mostrar informacion --}}
@section('headerblancotecho')

Testeo

@endsection
  
{{-- Seccion de mi header --}}
@section('micodigo')  
   

   <div id="save">
   <div class="bg-green-300 h-20 w-full">
       <span id="saveOutput">
       </span>
   </div>
   <div class="demo"></div>
   </div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

{{--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
--}}
{{--
<script src="{{ asset('plugins/jQuery-Bracket-World/dist/assets/scripts/jquery.bracket-world.min.js') }}"></script> 
    --}}
    
<script src="{{ asset('plugins/jquery-bracket-master/dist/jquery.bracket.min.js') }}"></script> 
                      
            
<script>  

var saveData = {
  teams: [
    ["Team 1", "Team 2"],
    ["Team 3", null],
    ["Team 4", null],
    ["Team 5", null]
  ],
  results: [
      [
        
      ]
  ]
};
 
/* Called whenever bracket is modified
 *
 * data:     changed bracket object in format given to init
 * userData: optional data given when bracket is created.
 */
function saveFn(data, userData) {
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
    var container = $('div#save .demo')
    container.bracket({
      init: saveData,
      save: saveFn,
      userData: "http://myapi"})
 
    /* You can also inquiry the current data */
    var data = container.bracket('data')
    $('#dataOutput').text(jQuery.toJSON(data))
  })


    
</script>    
    
@endsection