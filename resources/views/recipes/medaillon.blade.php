{{--@foreach($categunivers as $c)--}}

@empty($c)

    @if($recette->type_univers)
        <?php
        $media = DB::table('categunivers')->where('id', '=', $recette->type_univers)->first();
        ?>
        <a href="{{route('media.show', $media->name)}}">
            <div class="medail {{strtolower($media->name)}}"></div>
        </a>
    @endif

@else

    @if($c )
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

@endempty

