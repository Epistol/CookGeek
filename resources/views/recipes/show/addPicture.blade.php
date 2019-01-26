{{--If user logged in--}}

@auth
    {{--If any picture valid--}}
    <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                user="{{Auth::user()->id}}"></add-recipe>

@else

    <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                user=""></add-recipe>

@endif