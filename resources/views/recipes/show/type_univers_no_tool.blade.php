@foreach($recipe->universes as $media)
    @if($media->name== 'tv')
        <a href="{{route("media.show", lcfirst($media->name))}} ">
            <div class="icones {{strtolower($media->name)}} ">
            </div>
        </a>
    @else
        <a href="{{route("media.show", lcfirst($media->name)) }}">
            <div class="icones {{strtolower($media->name)}}   ">
            </div>
        </a>
    @endif
@endforeach
