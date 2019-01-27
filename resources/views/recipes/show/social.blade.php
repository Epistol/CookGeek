<div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
        <p class="control">
            <a class="button facebook"
               href="https://www.facebook.com/sharer.php?u={{url()->current()}}&t={{strip_tags(clean($recette->title))}}">

                          <span class="icon is-small">
                   <i class="fab fa-facebook-f fa-fw  fa-lg"></i>
                              <span hidden>Partager sur Facebook</span>
                          </span>
            </a>

        </p>
		<?php $univers = DB::table('univers')->where('id', $recette->univers)->first();
		?>

        <p class="control">
            @if($univers !== null)
                <a class="button twitter"
                   href="https://twitter.com/intent/tweet?text={{strip_tags(clean($recette->title))}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{ strip_tags(clean($univers->name))}}">
                    @else
                        <a class="button twitter"
                           href="https://twitter.com/intent/tweet?text={{strip_tags(clean($recette->title))}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{strip_tags(clean($recette->title))}} ">
                            @endif
                            <span class="icon is-small">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                 <span hidden>Partager sur Twitter</span>
                          </span>
                        </a>
        </p>
        @if(count($validPictures) === 1 )
            <p class="control">
                <a class="button pinterest "
                   href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&media={{strip_tags(clean(collect($validPictures->first()->urls)->firstWhere('name', 'normal')['url']))}}&description={{strip_tags(clean($recette->title)) }}">
                          <span class="icon is-medium">
                      <i class="fab fa-pinterest-p fa-fw"></i>
                               <span hidden>Partager sur Pinterest</span>
                          </span>
                </a>
            </p>
        @else
            <p class="control">
                <a class="button pinterest "
                   href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&description={{strip_tags(clean($recette->title))}}">
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

        {{--<socialshare url="{{url()->current()}}" :titre="{{$recette->title}}"></socialshare>--}}

    </div>
</div>
