<div class="background-round">
    <div class="columns">
        <div class="column" style="display:flex;justify-content:center;align-items:center;">
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
                            <span property="name">{{ strip_tags(clean($type->name ))}}</span>
                        </a>
                        <meta property="position" content="3">
                    </li>
                </ul>
            </nav>
        </div>
        <div class="column has-text-centered" style="display:flex;justify-content:center;align-items:center;">
            <h1 class="title is-paddingless">{{ strip_tags(clean($recette->title)) }}</h1>
        </div>
        <div class="column " style="display:flex;justify-content:flex-end;align-items:center;">
            @include('recipes.likeh')
        </div>
    </div>
</div>