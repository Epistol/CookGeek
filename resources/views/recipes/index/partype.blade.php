{{--Pour chaque univers, on va charger  1 SEULE recette--}}
<section class=" bordered-cdg">
    <div class="columns">



        {{-- On va charger la première recette--}}
        @forelse($recettes as $r)
            @if($r != null)
                @foreach($universcateg as $c)
                    @if($r->type_univers == $c->id)
                        <div class="column">
                            @include("recipes.index.excerpt")
                        </div>
                    @endif

                @endforeach
            @else
                <div class="column">

                </div>
            @endif
        @empty

        @endforelse


    </div>
</section>
