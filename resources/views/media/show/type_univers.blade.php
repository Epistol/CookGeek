@if($typeuniv)
@if($typeuniv->name== 'tv')
    <div class="icones {{strtolower($typeuniv->name)}} tooltip is-tooltip-right"
         data-tooltip="{{strtolower($typeuniv->name)}} ">
    </div>

@else
    <div class="icones {{strtolower($typeuniv->name)}}  tooltip is-tooltip-right"
         data-tooltip="{{ucfirst($typeuniv->name)}} ">
    </div>

@endif
@endif