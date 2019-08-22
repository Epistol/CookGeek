<div class="card cdg">
    <div class="card-image">
        <a href="{{route('recipe.show', $recipes[$i]->slug)}}">
            <figure class="image is-4by3">
                @if($recipe->getAuthorPictures(true)->first() == null)
                    <img src="http://via.placeholder.com/300x200?text={{$recipes[$i]->title}}" class="fit-cover"
                         alt="{{$recipes[$i]->title}} / CDG">
                @else
                    <img src="{{$recipe->getAuthorPictures(true)->first()->getUrl()}}" class="fit-cover"
                         alt="{{$recipes[$i]->title}} / CDG">
                @endif
            </figure>
        </a>
    </div>
    {{--   <categ_icon text_icon="{{$categ->name}}"></categ_icon>
       @include("recipes.medaillon")--}}

    <div class="card-content recipe-index">
        <div class="media">
            <div class="media-content is-centered">
                <p class="title w-4/12">
                    <a href="{{route('recipe.show', $recipes[$i]->slug)}}"> {{$recipes[$i]->title}}</a></p>
            </div>
        </div>

        {{--        <div class="content">
                      {{$recipes[$i]->commentary_author}}
                </div>--}}
    </div>
</div>