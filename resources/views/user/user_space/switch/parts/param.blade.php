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
                    <p class="help">Votre pseudo est modifiable à tout instant
                        si celui-ci n'est pas déjà pris.</p>
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="text" name="mail" value="{{Auth::user()->email}}">
                    <p class="help">Votre email n'est visible que par vous</p>
                </div>
            </div>
            @include('user.user_space.switch.parts.password')
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