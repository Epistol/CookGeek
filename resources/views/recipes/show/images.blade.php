<!-- Image part -->
<div class="has-text-centered" style="clear: both;" id="recipe-pictures">
    {{-- Original author picture validated --}}
    @if($recipe->getAuthorPictures(true)->isNotEmpty())
        {{-- Search for validated pictures from other users--}}
        @php $validPicture = $recipe->getAuthorPictures(true)->first(); @endphp
        @include('recipes.show.pictures.show_big')

        @foreach($recipe->getAuthorPictures(true, 1) as $index => $validPicture)
            @include('recipes.show.pictures.show_small')
        @endforeach
    @endif

    {{--  Validation for admin--}}
    @if($recipe->getAuthorPictures(false)->isNotEmpty())
        @foreach($recipe->getAuthorPictures(false) as $index => $picture)
            @auth
                @if($picture->users->first()->id == Auth::user()->id OR Auth::user()->hasRole('super-admin'))
                    @include('recipes.show.pictures.toValidate')
                @endif
            @endif
        @endforeach
    @endif

    {{--    If we have valid pictures from other users--}}
    @if($recipe->getNonAuthorPictures(true)->isNotEmpty())
        @if($recipe->getAuthorPictures(true)->isEmpty())
            @php $validPicture = $recipe->getNonAuthorPictures(true)->first(); @endphp
            @include('recipes.show.pictures.show_big')
        @endif

        @foreach($recipe->getNonAuthorPictures(true, 1) as $index => $validPicture)
            @include('recipes.show.pictures.show_small')
        @endforeach
    @else
        @if($recipe->getNonAuthorPictures(false)->isNotEmpty())
            @foreach($recipe->getNonAuthorPictures(false) as $index => $picture)
                @auth
                    @if($picture->users->first()->id == Auth::user()->id  OR Auth::user()->hasRole('super-admin'))
                        @include('recipes.show.pictures.toValidate')
                    @endif
                @endif
            @endforeach
        @endif
    @endif

    {{--    Always--}}
    @include('recipes.show.addMorePicture')
</div>