{{--Recettes ayant dans le nom la recherche --}}

@if(array_key_exists('recipe', $result))
    @foreach($result['recipe'] as $cat)
        {{$cat->title}}
    @endforeach
@endif