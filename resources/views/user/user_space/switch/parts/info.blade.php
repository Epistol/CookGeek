


<form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
      action="{{ route('recipe.store') }}">
    {{ csrf_field() }}

    <div class="flex mb-4">
        {{--Infos complémentaires--}}
        <div class="flex-1">
            @include("user.user.user_space.switch.parts.account.informations.basic")
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