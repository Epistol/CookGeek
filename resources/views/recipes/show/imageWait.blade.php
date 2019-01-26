@if($nonValidPictures !== "" )
@if(collect($nonValidPictures)->count() > 0)
    <div>
        <?php $img = $nonValidPictures->first(); ?>
        @include('recipes.pictures.waitValidation')
    </div>
@else
    @include('recipes.show.addMorePicture')
@endif
    @else
    @include('recipes.show.addMorePicture')

@endif