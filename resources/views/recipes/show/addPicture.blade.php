@auth

    @if(collect($firstimg->first())->firstWhere('user', '!=', Auth::user()->id))
        <add-recipe type="button" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user="{{Auth::user()->id}}"></add-recipe>
        @elseif(collect($firstimg)->count() <= 0 )
        <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user="{{Auth::user()->id}}"></add-recipe>
    @endif
@else
    @if(collect($firstimg)->count() > 0)
        <add-recipe type="button" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user=""></add-recipe>
    @else
        <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user=""></add-recipe>
    @endif

@endif