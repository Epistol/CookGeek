{{--Recettes ayant les ingrédients choisis --}}

@if($ingredient)
    @foreach($ingredient as $cat)
        <a class="button is-rounded"> {{$cat->name}}</a>
    @endforeach
@endif