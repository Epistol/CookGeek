@foreach($result['categunivers'] as $c)

    <a href="{{route('media.show', $c->name)}}">
        <div class=" ">
            @if($c->name== 'tv')
                <div class="medail {{strtolower($c->name)}}" ></div>
            @else
                <div class="medail {{strtolower($c->name)}}"></div>
            @endif
        </div>
    </a>

@endforeach