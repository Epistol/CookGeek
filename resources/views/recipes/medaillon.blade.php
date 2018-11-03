@if($c)
    <a href="{{route('media.show', $c->name)}}">
        <div class="medaillon ">
            @if($c->name== 'tv')
                <div class="medail {{strtolower($c->name)}}"></div>
            @else
                <div class="medail {{strtolower($c->name)}}"></div>
            @endif
        </div>
    </a>
@endif