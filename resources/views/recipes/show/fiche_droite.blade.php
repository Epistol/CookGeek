<p>

    @include("recipes.show.author")
</p>
<h4 class="title">Informations</h4>
<div style="display:flex;" class="">
    @include("recipes.show.diff")
</div>

<div class="">
    @include("recipes.show.price")
</div>


@include("recipes.show.times")

@if($typeuniv)
    @if($typeuniv->name== 'gaming')
        <iframe src="https://www.instant-gaming.com/affgames/igr313965/250x250" scrolling="no" frameborder="0"
                style="border: 1px solid #ccc; border-radius: 10px; overflow:hidden; width:250px; height:250px; width:100%;"
                allowTransparency="true"></iframe>
    @endif
@endif
