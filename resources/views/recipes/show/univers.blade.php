@if($recipe->universes->isNotEmpty())
    @foreach($recipe->universes as $index => $universe)
        @if(strip_tags($universe->name))
            <p class="is-brand show-recipe-title"> @lang("recipe.univers")</p>
            @foreach($recipe->universes as $universe)
            <a href="{{route('univers.show', $universe->name)}}"
               style="    color: #b87bc8;">{{$universe->name}}</a>
            @endforeach
        @endif
    @endforeach
@endif