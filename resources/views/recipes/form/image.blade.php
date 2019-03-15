<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">

        <label class="file-label">
            <div class="image recipe-add-img" id="limage">
                <?php
                			$img = DB::table('recipe_imgs')->where('recipe_id', '=', $recette->id)->first();
                			?>
                @if($img)
                <pictureupload type="recipe" recipeid="{{$recette->id}}"user={{ Auth::user()->name }} user_id={{ Auth::user()->id }}  picture={{$img->image_name}}></pictureupload>
@else
                        <pictureupload type="recipe" recipeid="{{$recette->id}}"user={{ Auth::user()->name }} user_id={{ Auth::user()->id }}  picture=""></pictureupload>
                @endif

                    <input class="file-input" id="upload" type="file" name="resume" accept="image/x-png,image/jpeg">
                    <span class="file-cta darker">

                                            <span class="file-label">
                                               <i class="fa fa-upload"></i> Ajouter une photo
                                            </span>
                                        </span>

                    <figure class="image is-square">
                        <img id="blah" class="fit-cover" src="#" alt=""/>
                    </figure>


            </div>

            {{-- Nom du fichier--}}
            {{--           <input id="filename" class="file-name" disabled>--}}
        </label>

    </div>

</div>