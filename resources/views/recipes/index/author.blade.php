<div class="">
    @if($recipe->user)
    <a href="{{route('user.show',$recipe->user->id)}}">
        <div class="is-flex-center">
            {{--Avatar--}}
                @if($recipe->user->img !== '')
                    <figure class="image w-12">
                        <img class="rounded-full "
                             alt="Avatar"
                             src="{{cleanInput($recipe->user->avatarUser)}}"
                             style="height: 100%;width: 100%;">
                    </figure>
                @else
                    <figure class="image w-12">
                        <img class="rounded-full"
                             src="https://api.adorable.io/avatars/64/{{ strip_tags($recipe->user->name)}}">
                    </figure>
                @endif

                {{--pseudo--}}
                <p><span style="padding-right: 0.3rem; margin-left: 1rem">@lang("common.by") </span>
                    <a href="{{route('user.show',$recipe->user->id)}}">
                        @php echo str_limit($recipe->user->name, 20, ' (...)'); @endphp
                    </a>
                </p>
        </div>
    </a>
    @endif

    {{--reseaux sociaux--}}
</div>


