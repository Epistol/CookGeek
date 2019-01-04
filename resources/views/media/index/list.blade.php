{{--Pour chaque univers, on va charger  1 SEULE recette--}}


<section class=" bordered-cdg">
    <div class="columns is-multiline">

            {{--   -> tout les univers--}}
        @foreach($medias as $index=>$media)
            <div class="column is-3">

                {{--<categ_icon text_icon="{{$media->name}}"></categ_icon>--}}
                {{ ucfirst($media->name) }}
            </div>
        @endforeach
    </div>

</section>
