@include('user_space.switch.parts.account.tabs')


<form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST"
      action="{{ route('recipe.store') }}">
    {{ csrf_field() }}

    <div class="columns ">
        {{--Photo profil--}}
        <div class="column is-5" >
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
                <button class="button is-text">Cancel</button>
            </div>

            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>

        </div>

    </div>

</form>