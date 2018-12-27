{{--Commentaire :--}}

@if($typeuniv)
@if($typeuniv->name== 'tv')
    <a href="{{route("type.show", lcfirst($typeuniv->name))}} ">
        <div class="icones {{strtolower($typeuniv->name)}} ">
        </div>
    </a>

@else
    <a href="{{route("type.show", lcfirst($typeuniv->name)) }}">
        <div class="icones {{strtolower($typeuniv->name)}}   ">
        </div>
    </a>

@endif
@endif