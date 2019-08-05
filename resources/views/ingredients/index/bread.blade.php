<div class="background-round">
    <div class="flex mb-4">
        <div class="flex-1" style="">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul vocab="https://schema.org/" typeof="BreadcrumbList">
                    <li property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" href="/">
                            <i class="fas fa-home"></i>  <span property="name">@lang('common.home')</span>
                        </a>
                        <meta property="position" content="1">
                    </li>
                    <li property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="{{route("ingredient.index")}}">
                            <span property="name">{{trans_choice('ingredients.ingredient', 2)}}</span>
                        </a>
                        <meta property="position" content="2">
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>