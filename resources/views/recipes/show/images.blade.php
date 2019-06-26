<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    {{-- Original author picture validated --}}
    @if($recipe->getAuthorPictures(true)->isNotEmpty())
        @include('recipes.show.pictures.author.show')
    @endif

    {{--  Validation for admin--}}
    @if($recipe->getAuthorPictures(false)->isNotEmpty())
        @foreach($recipe->getAuthorPictures(false) as $index => $picture)
            @include('recipes.show.pictures.toValidate')
        @endforeach
    @endif

    {{--    If we have valid pictures from other users--}}
    @if($recipe->getNonAuthorPictures(true)->isNotEmpty())
        @include('recipes.show.pictures.others.show')
    @else
        @if($recipe->getNonAuthorPictures(false)->isNotEmpty())
            @foreach($recipe->getNonAuthorPictures(false) as $index => $picture)
                @include('recipes.show.pictures.toValidate')
            @endforeach
        @endif
    @endif

    {{--    Always--}}
    @include('recipes.show.addMorePicture')
</div>