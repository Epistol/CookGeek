<div class="column">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">Accueil</a></li>
{{--            <li class=""><a href="{{route('media.index')}}">Media</a></li>--}}
            <li class="is-active"><a href="">{{ucfirst(strip_tags(clean($media->name)))}}</a></li>
        </ul>
    </nav>
</div>
