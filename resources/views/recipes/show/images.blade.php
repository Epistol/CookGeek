<div class="content">
    {{--Image principale--}}
    <figure class="image is-256x256 is-marginless">
        <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$firstimg->image_name}}">
    </figure>
    @if($images->isEmpty())
        {{--<p>Ajouter votre réalisation</p>--}}

    @else
        @foreach($images as $image)

            <figure class="image is-64x64 is-marginless">
                <img src="/recipes/{{$recette->id}}/{{$image->user_id}}/{{$image->image_name}}">
            </figure>
        @endforeach

    @endif
</div>