<aside class="menu blockcontent">
    <figure class="image is-128x128 menu-avatar">
        @if(Auth::user()->img!== "users/default.png")
            <img class="is-rounded menu-left-avatar" src="{{Auth::user()->img}}"/>
        @else
            <img class="is-rounded menu-left-avatar"
                 src="https://api.adorable.io/avatars/{{ Auth::user()->name }}"/>
        @endif
    </figure>

    <div class="menu">
        <div class="sous_cat">
            <p class="menu-label">
                @lang('account.my-account')
            </p>
            <ul class="menu-list">
                <li>
                    <a href="{{route('account.param')}}" class="
                        @if(Route::currentRouteNamed('account.param') || Route::currentRouteNamed('account.data') || Route::currentRouteNamed('account.info'))
                    {{'is-active'}}
                    @endif">@lang('account.parameter')</a>
                    <a href="{{route('account.data')}}">@lang('account.my-data')</a>
                </li>
            </ul>
        </div>
        <div class="sous_cat">
            <p class="menu-label">
                {{trans_choice('recipe.recipe', 2)}}
            </p>
            <ul class="menu-list">
                <li>
                    <a href="{{route('account.fav')}}"
                       class="@if(Route::currentRouteNamed('account.fav'))
                       {{'is-active'}}
                       @endif">@lang('common.my_favorites')</a>
                    <a href="{{route('account.recipe')}}">@lang('common.my_recipes')</a>
                </li>
            </ul>
        </div>
    </div>
</aside>

