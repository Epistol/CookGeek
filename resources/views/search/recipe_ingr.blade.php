{{--Recettes ayant les ingrédients choisis --}}

@if(array_key_exists('recipe', $result))
    @foreach($result['recipe'] as $cat)
       <b> {{$cat->title}}</b>
    @endforeach
@endif