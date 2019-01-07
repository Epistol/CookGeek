<section class=" bordered-cdg">
    <div class="columns is-multiline">

        @foreach($medias as $index=>$media)
            <div class="column is-2">
                <a class="" style="margin-left: 1rem"
                   href="{{route('media.show', $media->name)}}">
                    <figure class="image">
                        <img src="{{asset('/img/full_bg_media/')}}/{{lcfirst($media->name)}}.png" class="fit-cover"
                             style="-webkit-border-radius: 20px;
border-radius: 20px;">
                    </figure>
                </a>
            </div>

        @endforeach
    </div>
</section>
