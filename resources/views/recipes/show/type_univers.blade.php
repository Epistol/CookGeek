<label class="radio">
    @if($typeuniv->name== 'tv')
     <div class="icones {{strtolower($typeuniv->name)}}" >
     </div>

    @else
                <div class="icones {{strtolower($typeuniv->name)}}">
                </div>

    @endif
</label>