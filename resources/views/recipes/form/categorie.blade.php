<div class="field ">
    <div class="control ">
        <div class="select is-fullwidth">
            <select required name="categ_plat">
                <option disabled  name="categ_plat" >Type de plat</option>
                @foreach ($types_plat as $key=>$diff)
                    @php(++$key)
                        <option name="categ_plat" {{ $key === old('type') ? "selected":"" }}
                        value="{{$key}}">{{cleanInput($diff->name)}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>