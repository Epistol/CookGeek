{{--Pour chaque type de recette, on va charger  4  recettes --}}
<?php
$recettes = DB::table('recipes')->where('type', '=', $type->id)->latest()->limit(4)->get();
$i = 0;
?>
<a class="tag is-primary is-medium" href="/recette/type/{{lcfirst($type->name)}}">{{$type->name}}</a>

<section class=" bordered-cdg">
    <div class="columns">
        @foreach($recettes as $index=>$recette)
            <?php $i = $index + 1;
            $c = DB::table('categunivers')->where('id', '=', $recette->type_univers)->first();
            ?>
            <div class="column is-one-quarter">
                @include("recipes.index.excerptsimple")
            </div>
        @endforeach
    </div>

</section>
