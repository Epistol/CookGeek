
<?php $i=0;?>
@foreach($recette as $r)
    <?php $i++;?>
    @if($r->type_univers == $c->id)

        @if($i == 1 )
            <div class="columns">
        @endif
                <div class="column">
                    @include("recipes.index.excerpt")
                </div>
                @if($i == 4)
            </div>
            @break
        @endif


    @endif

@endforeach