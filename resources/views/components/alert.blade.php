<div 
{{ 
$attributes->merge(['class' =>"bg-$color-100 border-l-4 border-$color-500 text-$color-700 p-4"]) 
}} 
role="alert">
{{-- Lo que estamos haciendo arriba es unir las cadenas para que solo quede una cadena que diga: 
    class="atributos"    --}}
        <p class="font-bold">{{$title}}</p> {{-- este titulo es un slot pero con nombre --}}
        <p>{{$slot}}</p>
</div>


