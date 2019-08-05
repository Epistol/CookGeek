{{--Pour chaque type de recette, on va charger  4  recettes --}}
<?php
$recipes = DB::table('recipes')->where('type', '=', $type->id)->where('validated',1)->latest()->limit(4)->get();
$i = 0;
?>
<a class="tag is-primary is-medium" href="{{route('type.show', lcfirst($type->name))}}">{{$type->name}}</a>
<section class=" bordered-cdg">
    <div class="flex mb-4">
        @foreach($recipes as $index=>$recipe)
            <?php $i = $index + 1;
            $c = DB::table('categunivers')->where('id',  $recipe->type_univers)->first();
            ?>
            <div class="flex-1 is-one-quarter">
                @include("recipes.index.excerptsimple")
            </div>
        @endforeach
    </div>

</section>
