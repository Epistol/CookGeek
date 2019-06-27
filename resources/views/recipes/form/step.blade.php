<section class="ingredients">

    <h2 class="title is-4">Etapes</h2>
    @if(Route::has('add'))
        <stepsedit ></stepsedit>
    @else
        <stepsedit recipe_id="{{intval($recipe->id)}}"></stepsedit>
    @endif
</section>




