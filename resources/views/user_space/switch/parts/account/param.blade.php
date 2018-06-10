<form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST"
      action="{{ route('param.store') }}">
    {{ csrf_field() }}
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="columns ">
        {{--Photo profil--}}
        <div class="column is-5">
            @include("user_space.switch.parts.account.informations.avatar")

        </div>
        {{--Infos classique--}}
        <div class="column">
            @include("user_space.switch.parts.account.informations.basic")
            @include("user_space.switch.parts.account.informations.switch")

        </div>
    </div>

    <div class="is-flex-center">
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Sauvegarder</button>
            </div>

        </div>
    </div>
</form>