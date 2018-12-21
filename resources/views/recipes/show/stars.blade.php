<p class="is-brand show-recipe-title">
    @lang('recipe.rating')
</p>
<div class="content is-flex-center rating">
    @auth
        <star-rating :rating="{{$stars[0]}}" :increment="0.5" :star-size="20" :userid="{{Auth::user()->id}}"
                     :recipeid="{{$recette->id}}"></star-rating>
    @endauth
    @guest
        <star-rating :rating="{{$stars[0]}}" :increment="0.5" :star-size="20" :userid="-1"
                     :recipeid="{{$recette->id}}"></star-rating>

    @endguest

</div>
