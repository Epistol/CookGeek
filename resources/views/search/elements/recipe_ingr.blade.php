{{--Recettes ayant les ingrédients choisis --}}
<h2 class="title">Ingrédients</h2>

<section class="">
    @if($result['ingredient'])
        @foreach($result['ingredient'] as $ingredient)
            <a class="button rounded-full"> {{$ingredient->name}}</a>
        @endforeach
    @endif
</section>
