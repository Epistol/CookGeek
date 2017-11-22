    @if($typeuniv->name== 'tv')
     <div class="icones {{strtolower($typeuniv->name)}} tooltip is-tooltip-bottom" data-tooltip="{{strtolower($typeuniv->name)}} " >
     </div>

    @else
                <div class="icones {{strtolower($typeuniv->name)}}  tooltip is-tooltip-bottom" data-tooltip="{{ucfirst($typeuniv->name)}} ">
                </div>

    @endif