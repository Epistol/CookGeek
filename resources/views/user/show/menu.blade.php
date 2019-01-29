<aside class="blockcontent menu-user">
    <div class="menu-avatar">
        <figure class="image is-128x128 menu-avatar">
            @if($user->avatar !== "users/default.png")
                <img  class="is-rounded menu-left-avatar"  src="/user/{{$user->id}}/picture/{{$user->avatar}}" />
            @else
                <img  class="is-rounded menu-left-avatar"  src="https://api.adorable.io/avatars/{{$user->id}}" />
            @endif
        </figure>
    </div>

    <div class="menu">
        <h1 class="title" style="text-align:center">{{strip_tags(clean($user->name))}}</h1>
        <div class="sous_cat">
            <p class="menu-label">
               Inscrit le : {{Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
            </p>
            <p class="menu-label">
                Dernière connexion : {{Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}
            </p>

        </div>

    </div>
</aside>

