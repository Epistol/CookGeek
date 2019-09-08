<div class="card cdg">
    <div class="card-image"><a href="{{route('recipe.show', $recipe->slug)}}">
            @include('recipes.elements.picture')
        </a>
    </div>
    @include("recipes.medaillon")
    <div class="card-content recipe-index">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title w-4/12"><a href="{{route('recipe.show', $recipe->slug)}}"> {{ strip_tags($recipe->title)}}</a></p>
            </div>
        </div>
    </div>
</div>