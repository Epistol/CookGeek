{{--Commentaire :--}}

@if($typeuniv)
@if($typeuniv->name== 'tv')
    <a href="/type/{{strtolower($typeuniv->name)}}">
        <div class="icones {{strtolower($typeuniv->name)}} ">
        </div>
    </a>

@else
    <a href="/type/{{strtolower($typeuniv->name)}}">
        <div class="icones {{strtolower($typeuniv->name)}}   ">
        </div>
    </a>

@endif
@endif