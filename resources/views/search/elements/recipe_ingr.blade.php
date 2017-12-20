{{--Recettes ayant les ingrédients choisis --}}

@if($valeurs['ingredient'])
    @foreach($par_ingr as $cat)
        <a class="button is-rounded"> {{$cat->name}}</a>
    @endforeach
@endif