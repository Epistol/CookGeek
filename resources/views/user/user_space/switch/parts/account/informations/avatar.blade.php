<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">

            <div class="recipe-add-img">
                <label class="label">Mon avatar</label>
                <pictureupload user={{ Auth::user()->name }} user_id={{ Auth::user()->id }}  picture={{Auth::user()->avatar}}></pictureupload>
            </div>

            {{-- Nom du fichier--}}
            {{--           <input id="filename" class="file-name" disabled>--}}

    </div>

</div>