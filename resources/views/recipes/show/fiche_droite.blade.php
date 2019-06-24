<p>
    @include("recipes.show.author")
</p>

<div class="side-bg">
    <h4 class="title">Informations</h4>
    <div style="display:flex;" class="">
        @include("recipes.show.diff")
    </div>
    <div class="">
        @include("recipes.show.price")
    </div>
</div>

@include("recipes.show.times")
@include("recipes.show.vegan")

<?php
use App\Categunivers;
$typeuniv = Categunivers::where('id', $recipe->type_univers)->first();
?>

@if($typeuniv)
    @if($typeuniv->name== 'gaming')
        <div class="side-bg pub">
            <h4 class="title">Pub</h4>
            <iframe src="https://www.instant-gaming.com/affgames/igr313965/250x250" scrolling="no" frameborder="0"
                    style="border: 1px solid #ccc; border-radius: 10px; overflow:hidden; width:250px; height:250px; width:100%;"
                    allowTransparency="true"></iframe>
        </div>
    @endif
@endif


