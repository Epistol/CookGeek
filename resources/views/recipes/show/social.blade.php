<div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
        <p class="control">
            <a class="button facebook"
              href="https://www.facebook.com/sharer.php?u={{url()->current()}}&t={{$recette->title}}">
                          <span class="icon is-small">
                   <i class="fab fa-facebook-f fa-fw  fa-lg"></i>

                          </span>
            </a>


        </p>
		<?php $univers = DB::table('univers')->where('id', $recette->univers)->first(); ?>
        <p class="control">
            <a class="button twitter" href="https://twitter.com/intent/tweet?text={{$recette->title}}+-+CDG&url={{url()->current()}}&via=CuisineDeGeek&hashtags=cuisine,geek,{{$univers->name}}">
                          <span class="icon is-small">
                          <i class="fab fa-twitter" aria-hidden="true"></i>
                          </span>
            </a>
        </p>
        <p class="control">
	        <?php
            if(isset($firstimg)){
	            $image = asset('/recipes/' . $recette->id . '/' . $recette->id_user . '/' . $firstimg->image_name);
            }
            else {
            	$image = null;
            }
	        ?>
            <a class="button pinterest " href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&media={{$image}}&description={{$recette->title}}">
                          <span class="icon is-medium 	 ">
                      <i class="fab fa-pinterest-p fa-fw"></i>

                          </span>
            </a>
        </p>
        <p class="control">
            <a class="button tumblr " href="http://tumblr.com/widgets/share/tool?canonicalUrl={{url()->current()}}" >
                          <span class="icon is-small">
                          <i class="fab fa-tumblr fa-fw" aria-hidden="true"></i>

                          </span>
            </a>
        </p>

        {{--<socialshare url="{{url()->current()}}" :titre="{{$recette->title}}"></socialshare>--}}

    </div>
</div>
