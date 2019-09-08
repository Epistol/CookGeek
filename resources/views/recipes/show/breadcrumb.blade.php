<header class="background-round">
    <div class="flex mb-4">
        <div class="flex-1" style="display:flex;justify-content:center;align-items:center;">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                    <li property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="/">
                            <span property="name">Accueil</span>
                        </a>
                        <meta property="position" content="1">
                    </li>
                    <li property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="{{ route("recipe.index") }}">
                            <span property="name">Recettes</span>
                        </a>
                        <meta property="position" content="2">
                    </li>
                    <li property="itemListElement" typeof="ListItem" class="">
                        <a property="item" typeof="WebPage"
                           style="margin-left: 0.5rem; margin-right:0.5rem"
                           href="{{ route("type.show", lcfirst($type->name)) }}">
                            <span property="name">{{ strip_tags($type->name )}}</span>
                        </a>
                        <meta property="position" content="3">
                    </li>
                </ul>
            </nav>
        </div>
        <div class="flex-1 has-text-centered" style="display:flex;justify-content:center;align-items:center;">
            @if(Route::is('*.edit'))
                <input value="{{$recipe->title}}"/>
            @else
                <h1 class="title ">{{ strip_tags($recipe->title) }}</h1>
            @endif
        </div>
        <div class="flex-1 " style="display:flex;justify-content:flex-end;align-items:center;">
            @include('recipes.likeh')
        </div>
    </div>
</header>