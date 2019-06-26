@if($recipe->universes->isNotEmpty())
    @foreach($recipe->universes as $index => $universe)
        @if(strip_tags(clean($universe->name)))
            <p class="is-brand show-recipe-title"> @lang("recipe.univers")</p>
            <a href="{{route('univers.show', $recipe->univers->name)}}"
               style="    color: #b87bc8;">{{$recipe->univers->name}}</a>
        @endif
    @endforeach
@endif