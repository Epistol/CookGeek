<div class="column">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li class=""><a href="{{route('type.index')}}">Types</a></li>
            <li class="is-active"><a href="">{{strip_tags(clean($type->name))}}</a></li>
        </ul>
    </nav>
</div>
