<form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST" id="params"
      action="{{ route('param.store') }}">
    @csrf

    <div class="columns ">
        {{--Photo profil--}}

        {{--Infos classique--}}
        <div class="column">
            <div class="field">
                <label class="label">Pseudo</label>
                <div class="control">
                    <input class="input" type="text" name="pseudo" value="{{Auth::user()->name}}">
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="mail" value="{{Auth::user()->email}}">
                </div>
            </div>
            <div class="field">
                <label class="label">Mot de passe</label>
                <div class="control">
                    <input class="input" type="password" name="mdp" placeholder="">
                </div>
            </div>
            <div class="is-flex-center">
                <div class="field is-grouped">
                    <div class="control">
                        <validationform><span slot="text">Sauvegarder</span></validationform>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            @include("user.user_space.switch.parts.informations.avatar")
        </div>
    </div>


</form>