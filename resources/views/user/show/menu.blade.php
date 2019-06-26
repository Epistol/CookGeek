<aside class="blockcontent menu-user">
    <div class="menu-avatar">
        <figure class="image is-128x128 menu-avatar">
            @if($user->img !== "")
                <img class="is-rounded menu-left-avatar" src="{{$user->avatarUser}}"/>
            @else
                <img class="is-rounded menu-left-avatar" src="https://api.adorable.io/avatars/{{$user->id}}"/>
            @endif
        </figure>
    </div>

    <div class="menu">
        <h1 class="title" style="text-align:center">{{strip_tags(clean($user->name))}}</h1>
        <div class="sous_cat">
            <p class="menu-label">
                @lang('common.registered') {{Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
            </p>
            <p class="menu-label">
                @lang('account.last_connected') {{Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}
            </p>
        </div>
    </div>
</aside>

