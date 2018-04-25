@include('user_space.parts.account.tabs')


<form class="form-horizontal addrecipe" enctype="multipart/form-data" method="POST"
      action="{{ route('recipe.store') }}">
    {{ csrf_field() }}


    <div class="columns">
        {{--Photo profil--}}
        <div class="column">
            @include("user_space.parts.account.informations.avatar")

        </div>
        {{--Infos classique--}}
        <div class="column">
            @include("user_space.parts.account.informations.basic")
            @include("user_space.parts.account.informations.switch")

        </div>


    </div>


</form>