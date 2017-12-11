{{--Recettes ayant les ingrédients choisis --}}

@if(array_key_exists('recipe', $result))
    @foreach($result['recipe'] as $cat)
        {{$cat->title}}
    @endforeach
@endif