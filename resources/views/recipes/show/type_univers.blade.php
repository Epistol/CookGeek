@if($typeuniv)
@if($typeuniv->name== 'tv')
    <a href="{{route("media.show", strtolower($typeuniv->name))}}"><div class="icones {{strtolower($typeuniv->name)}} tooltip is-tooltip-right"
         data-tooltip="{{strtolower($typeuniv->name)}} ">
    </div></a>

@else
    <a href="{{route("media.show", strtolower($typeuniv->name))}}"><div class="icones {{strtolower($typeuniv->name)}}  tooltip is-tooltip-right"
         data-tooltip="{{ucfirst($typeuniv->name)}} ">
    </div></a>

@endif
@endif
