<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">

        <label class="file-label">
            <div class="image ajout_recette_img" id="limage">
                <?php
                			$img = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->first();
                			?>
                <pictureupload type="recipe" recipeid="{{$recette->id}}"user={{ Auth::user()->name }} user_id={{ Auth::user()->id }}  picture={{$img->image_name}}></pictureupload>


            </div>

            {{-- Nom du fichier--}}
            {{--           <input id="filename" class="file-name" disabled>--}}
        </label>

    </div>

</div>