<section class=" bordered-cdg">
    <div class="columns is-multiline">

        @foreach($medias as $index=>$media)
            <a class="" style="margin-left: 1rem"
               href="{{route('media.show', $media->name)}}">

                <figure class="image is-128x128">
                    <img src="{{asset('/img/full_bg_media/')}}/{{lcfirst($media->name)}}.png" class="fit-cover" style="-webkit-border-radius: 20px;
border-radius: 20px;">
                </figure>
            </a>

        @endforeach
    </div>

</section>
