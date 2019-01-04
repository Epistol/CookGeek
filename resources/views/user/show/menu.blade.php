<aside class="blockcontent menu_user">
    <div class="avatar_menu">
        <figure class="image is-128x128 avatar_menu">
            @if($user->avatar !== "users/default.png")
                <img  class="is-rounded avatar_left_menu"  src="/user/{{$user->id}}/picture/{{$user->avatar}}" />
            @else
                <img  class="is-rounded avatar_left_menu"  src="https://api.adorable.io/avatars/{{$user->id}}" />
            @endif
        </figure>
    </div>

    <div class="menu">
        <h1 class="title" style="text-align:center">{{$user->name}}</h1>
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

