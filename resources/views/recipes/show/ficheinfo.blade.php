<div class="content ficheinfo">

    <p>

        @include("recipes.show.author")
    </p>
    <div style="display:flex;" class="">
        @include("recipes.show.diff")
    </div>

    <div class="">
        @include("recipes.show.price")
    </div>


    @include("recipes.show.times")

    @if($typeuniv)
        @if($typeuniv->name== 'gaming')

            <iframe src="https://www.instant-gaming.com/affgames/igr313965/250x250" scrolling="no" frameborder="0" style="border: 1px solid #ccc; border-radius: 10px; overflow:hidden; width:250px; height:250px;" allowTransparency="true"></iframe>
        @endif
        @endif

</div>

{{--// Is-premium (afficher son yt, fb, creations)--}}
{{--// Parts--}}
{{--  @include("recipes.show.parts")--}}
{{--// Temps--}}
{{--   @include("recipes.show.timing")--}}
{{--// Liking--}}
{{--    @include("recipes.show.like")--}}
