<div class=" has-text-centered" style="border-right: 1px solid #e5e1fb;border-bottom: 1px solid #e5e1fb;">
    {{--Image principale--}}
    @if($firstimg != null )
    <figure class="image" >
        <img src="/recipes/{{$recette->id}}/{{$recette->id_user}}/{{$firstimg->image_name}}">
    </figure>
    @endif
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
{{--
<div class="is-flex-center" style="margin-top: 2rem">
    <div class="field">
        <p class="control">

            <a href="" class="button">
                          <span class="icon is-small">
                                         <i class="material-icons">&#xE439;</i>
                          </span>
                <span>
                                            Ajouter votre photo
                                   </span>
            </a>
        </p>
    </div>
</div>
--}}
