@if($nonValidPictures !== "" )
    @if($nonValidPictures->count() > 0)
            <?php $img = $nonValidPictures->first(); ?>
            @include('recipes.pictures.waitValidation')
    @else
        @include('recipes.show.addMorePicture')
    @endif
@else
    @include('recipes.show.addMorePicture')
@endif