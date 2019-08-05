@foreach($result['univers'] as $univ)
    @if(strip_tags(clean($univ->name)))
    <a class="button rounded-full" href="{{route('univers.show', strip_tags(clean($univ->name)))}}"> {{strip_tags(clean($univ->name))}}</a>
    @endif
@endforeach