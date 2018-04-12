<div class="field ">

    <div class="control">
        <div class="select is-fullwidth">
            <select required name="difficulty" id="difficulty">
                <option disabled value="" selected="selected">Difficulté</option>
                @foreach ($difficulty as $key=>$diff)
                    @php(++$key)
                    <option value="{{$key}}">{{$diff->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>