<p class="is-brand show-recipe-title">
    @lang('recipe.rating')
</p>
<div class="content is-flex-center rating">


    <star-rating :rating="{{$stars[0]}}" :increment="0.5" :star-size="20" :recipeid="{{$recette->id}}"></star-rating>


</div>
