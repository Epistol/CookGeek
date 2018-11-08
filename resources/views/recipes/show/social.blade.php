<div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
        <p class="control">
            <a class="button facebook"
               onclick="javascript:window.open('https://www.facebook.com/sharer.php?u={{url()->current()}}&t={{$recette->title}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                          <span class="icon is-small">
                   <i class="fab fa-facebook-f fa-fw  fa-lg"></i>

                          </span>
            </a>


        </p>
		<?php $univers = DB::table('univers')->where('id', $recette->univers)->first(); ?>
        <p class="control">
            <a class="button twitter "
               onclick="javascript:window.open('https://twitter.com/intent/tweet?text={{$recette->title}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{$univers->name}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                          <span class="icon is-small">
                          <i class="fab fa-twitter" aria-hidden="true"></i>
                          </span>
            </a>
        </p>
        <p class="control">
            <a class="button pinterest "
               onclick="javascript:window.open('http://pinterest.com/pin/create/button/?url={{url()->current()}}&description={{$recette->title}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
                          <span class="icon is-medium 	 ">
                      <i class="fab fa-pinterest-p fa-fw"></i>

                          </span>
            </a>
        </p>
        <p class="control">
            <a class="button tumblr "
               onclick="javascript:window.open('http://tumblr.com/widgets/share/tool?canonicalUrl={{url()->current()}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"
            >
                          <span class="icon is-small">
                          <i class="fab fa-tumblr fa-fw" aria-hidden="true"></i>

                          </span>
            </a>
        </p>
    </div>
</div>
