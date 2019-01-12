{{--Recettes ayant les ingrédients choisis --}}
<h2 class="title">Ingrédients</h2>

<section class="">
    @if($ingredient)
        @foreach($ingredient as $cat)
            <a class="button is-rounded"> {{$cat->name}}</a>
        @endforeach
    @endif
</section>
