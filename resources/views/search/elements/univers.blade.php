@foreach($result['univers'] as $univ)
    <a class="button is-rounded" href="{{route('univers.show', $univ->id)}}"> {{$univ->name}}</a>
@endforeach