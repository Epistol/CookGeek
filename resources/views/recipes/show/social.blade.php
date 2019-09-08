@if(!Route::is('*.edit'))
    <div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
        <p class="control">
            <a class="button facebook"
               href="https://www.facebook.com/sharer.php?u={{url()->current()}}&t={{strip_tags($recipe->title)}}">
                          <span class="icon is-small">
                   <i class="fab fa-facebook-f fa-fw  fa-lg"></i>
                              <span hidden>Partager sur Facebook</span>
                          </span>
            </a>
        </p>
        <p class="control">
            @if($recipe->universes->count() > 0)
                <a class="button twitter"
                   href="https://twitter.com/intent/tweet?text={{strip_tags($recipe->title)}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{ strip_tags($recipe->universes->first()->name)}}">
                    @else
                        <a class="button twitter"
                           href="https://twitter.com/intent/tweet?text={{strip_tags($recipe->title)}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{strip_tags($recipe->title)}} ">
                            @endif
                            <span class="icon is-small">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                 <span hidden>Partager sur Twitter</span>
                          </span>
                        </a>
        </p>
        @if($recipe->getBestPicture()->isNotEmpty())
            <p class="control">
                <a class="button pinterest"
                   href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&media={{$recipe->getBestPicture()->first()->getUrl()}}&description={{strip_tags($recipe->title) }}">
                          <span class="icon is-medium">
                      <i class="fab fa-pinterest-p fa-fw"></i>
                               <span hidden>Partager sur Pinterest</span>
                          </span>
                </a>
            </p>
        @else
            <p class="control">
                <a class="button pinterest"
                   href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&description={{strip_tags($recipe->title)}}">
                          <span class="icon is-medium 	 ">
                      <i class="fab fa-pinterest-p fa-fw"></i>
                              <span hidden>Partager sur Pinterest</span>
                          </span>
                </a>
            </p>
        @endif

        <p class="control">
            <a class="button tumblr " href="http://tumblr.com/widgets/share/tool?canonicalUrl={{url()->current()}}">
                          <span class="icon is-small">
                          <i class="fab fa-tumblr fa-fw" aria-hidden="true"></i>
                               <span hidden>Partager sur Tumblr</span>
                          </span>
            </a>
        </p>

        {{--<socialshare url="{{url()->current()}}" :titre="{{$recipe->title}}"></socialshare>--}}

    </div>
</div>
@endif