<form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST" id="params"
      action="{{ route('param.store') }}">
    @csrf

    <div class="columns ">
        {{--Photo profil--}}

        {{--Infos classique--}}
        <div class="column">
            @include("user_space.switch.parts.account.informations.basic")
            @include("user_space.switch.parts.account.informations.switch")
            <div class="is-flex-center">
                <div class="field is-grouped">
                    <div class="control">
                        <validationform><span slot="text">Sauvegarder</span></validationform>
                    </div>

                </div>
            </div>
        </div>
        <div class="column is-4">
            @include("user_space.switch.parts.account.informations.avatar")
        </div>
    </div>


</form>