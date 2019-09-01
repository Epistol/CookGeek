<p class="is-brand show-recipe-title">
    @lang('recipe.rating')
</p>
<div class="content is-flex-center rating">
    @auth
        <star-rating :rating="{{round($recipe->getAvgNote())}}" :increment="0.5" :star-size="20" :userid="{{Auth::user()->id}}"
                     :recipeid="{{$recipe->id}}"></star-rating>
    @endauth
    @guest
        <star-rating :rating="{{round($recipe->getAvgNote())}}" :increment="0.5" :star-size="20" :userid="-1"
                     :recipeid="{{$recipe->id}}"></star-rating>

    @endguest

</div>
