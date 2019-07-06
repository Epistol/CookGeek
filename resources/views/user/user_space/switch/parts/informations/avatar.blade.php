<div class="field addphoto">
    <div class="file is-centered is-boxed has-name">
        <div class="recipe-add-img">
            <label class="label">Mon avatar</label>
            @auth
            @if(Auth::user()->avatarUser!== 'users/default.png' &&Auth::user()->avatarUser !== '')
                <img src="{{Auth::user()->avatarUser}}"/>
            @endif
            <set-picture></set-picture>
                @endauth
        </div>
        {{-- Nom du fichier--}}
        {{--           <input id="filename" class="file-name" disabled>--}}
    </div>
</div>
