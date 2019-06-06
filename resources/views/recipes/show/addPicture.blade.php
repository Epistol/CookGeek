{{--If user logged in--}}

@auth
    {{--If any picture valid--}}
    <add-recipe type="placeholder" recipeid="{{$recipe->id}}" recipehash="{{$recipe->hashid}}"
                user="{{Auth::user()->id}}"></add-recipe>

@else

    <add-recipe type="placeholder" recipeid="{{$recipe->id}}" recipehash="{{$recipe->hashid}}"
                user=""></add-recipe>

@endif