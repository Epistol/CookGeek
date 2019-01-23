<div class="card cdg">
    <div class="card-image"><a href="{{route('recipe.show', $recette->slug)}}">
            @include('recipes.elements.picture')
        </a>
    </div>
    @include("recipes.medaillon")
    <div class="card-content indexrecipe">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title is-4"><a href="{{route('recipe.show', $recette->slug)}}"> {{ strip_tags(clean($recette->title)) }}</a></p>
            </div>
        </div>

        <div class="content">
        </div>
    </div>
</div>