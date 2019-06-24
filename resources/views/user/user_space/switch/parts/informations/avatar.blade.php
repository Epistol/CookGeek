<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">
        <div class="recipe-add-img">
            <label class="label">Mon avatar</label>
            @if(Auth::user()->img!== 'users/default.png' &&Auth::user()->img !== '')
                <img src="{{Auth::user()->img}}"/>
            @endif
            <set-picture></set-picture>
        </div>
        {{-- Nom du fichier--}}
        {{--           <input id="filename" class="file-name" disabled>--}}
    </div>
</div>
