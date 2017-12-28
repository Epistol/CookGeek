    @if($universcateg->name== 'tv')
     <div class="icones {{strtolower($universcateg->name)}} tooltip is-tooltip-right" data-tooltip="{{strtolower($universcateg->name)}} " >
     </div>

    @else
                <div class="icones {{strtolower($universcateg->name)}}  tooltip is-tooltip-right" data-tooltip="{{ucfirst($universcateg->name)}} ">
                </div>

    @endif