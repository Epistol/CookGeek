<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">

        <label class="file-label">
            <div class="image ajout_recette_img">
                <input class="file-input" id="upload" type="file" name="resume" accept="image/x-png,image/jpeg">

                @if(Auth::user()->img)
                    <img id="blah" class="is-clearfix" src="#" alt=""/>
                @else
                    <img src="https://api.adorable.io/avatars/{{Auth::user()->name}}" style="max-width:196px;">
                @endif


                <span class="file-cta darker">

                                            <span class="file-label btn"> Modifier
                                            </span>
                                        </span>


            </div>

            {{-- Nom du fichier--}}
            {{--           <input id="filename" class="file-name" disabled>--}}
        </label>

    </div>

</div>