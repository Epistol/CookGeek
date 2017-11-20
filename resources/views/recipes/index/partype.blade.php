@foreach($universcateg as $c)

    <section class=" bordered-cdg">

        @if($c->name== 'tv')
            <div class="icones {{strtolower($c->name)}}" ></div>
        @else
            <div class="icones {{strtolower($c->name)}}"></div>
        @endif

        <h1 class="title">{{ucfirst($c->name)}}</h1>

<div class="horizontalover">
    @include("recipes.index.liste")
</div>

    </section>

@endforeach