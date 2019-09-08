@foreach($result['univers'] as $univ)
    @if(strip_tags($univ->name))
    <a class="button rounded-full" href="{{route('univers.show', strip_tags($univ->name))}}"> {{strip_tags($univ->name)}}</a>
    @endif
@endforeach