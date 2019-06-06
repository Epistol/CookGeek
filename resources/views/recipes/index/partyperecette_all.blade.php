{{--Pour chaque type de recette, on va charger  4  recettes --}}
<?php
$recipes = DB::table('recipes')->where('type', '=', $type->id)->where('validated', '=', 1)->paginate(12);
$i = 0;
?>
<a class="tag is-primary is-medium" href="{{route('type.show', lcfirst($type->name))}}">{{$type->name}}</a>

<section class=" bordered-cdg">
    <div class="columns">
        @foreach($recipes as $index=>$recipe)
            <?php $i = $index + 1;
            $c = DB::table('categunivers')->where('id', '=', $recipe->type_univers)->first();
            ?>
            <div class="column is-one-quarter">
                @include("recipes.index.excerptsimple")
            </div>

            @if($i % 4 == 0)

    </div>
    <div class="columns">
        @endif

        @endforeach
    </div>
    {{$recipes->links()}}

</section>
