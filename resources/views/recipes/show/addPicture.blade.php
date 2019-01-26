{{--If user logged in--}}

<?php //dd($firstimg);?>
@auth

    {{--// AUTRE CONDITION :
    Si une image est déjà en attente de validation, pas besoin d'afficher le bouton, on peut sans doute le remplacer par un bouton Pause \ En attente--}}

    {{--If image is not by author--}}
    @if($validPictures->firstWhere('user', '!=', Auth::user()->id))
        @if($validPictures->firstWhere('validated', '=', 1))
            <add-recipe type="button" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                        user="{{Auth::user()->id}}"></add-recipe>
            {{--If there is no picture --}}
        @endif
    @elseif(collect($validPictures)->count() <= 0 )
        <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user="{{Auth::user()->id}}"></add-recipe>
    @endif
@else
    @if(collect($validPictures)->count() > 0)
        <add-recipe type="button" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user=""></add-recipe>
    @else
        <add-recipe type="placeholder" recipeid="{{$recette->id}}" recipehash="{{$recette->hashid}}"
                    user=""></add-recipe>
    @endif

@endif