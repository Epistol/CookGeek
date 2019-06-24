<div class="">
    @if($recipe->user)
    <a href="/user/{{$recipe->user->name}}">
        <div class="is-flex-center">
            {{--Avatar--}}
                <?php
//                $nb_recipes = DB::table('recipes')->where('id_user', $recipe->user->id)->count();
                ?>
                @if($recipe->user->img !== '')
                    <figure class="image is-48x48">
                        <img class="is-rounded "
                             src="{{cleanInput($recipe->user->img)}}"
                             style="height: 100%;width: 100%;">
                    </figure>
                @else
                    <figure class="image is-48x48">
                        <img class="is-rounded"
                             src="https://api.adorable.io/avatars/64/{{ strip_tags(clean($recipe->user->name))}}">
                    </figure>
                @endif

                {{--pseudo--}}
                <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span>
                    <a href="/user/{{$recipe->user->name}}">
                        @php echo str_limit($recipe->user->name, 20, ' (...)'); @endphp
                    </a>
                </p>
        </div>
    </a>
    @endif

    {{--reseaux sociaux--}}
</div>


