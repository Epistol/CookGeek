<div class="field ">

    <div class="control ">
        <div class="select is-fullwidth">
            <select required name="categ_plat">
                <option disabled value="" name="categ_plat" selected="selected">Type de plat</option>

                @foreach ($types_plat as $key=>$diff)
                    @php(++$key)
                    @if(old('categ_plat') == $key)
                        <option name="categ_plat" selected="choix" value="{{$key}}">{{$diff->name}}</option>

                    @else
                        <option name="categ_plat" value="{{$key}}">{{$diff->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>