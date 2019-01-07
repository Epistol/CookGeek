<div class="field ">

    <div class="control">
        <div class="select is-fullwidth">
            <select required name="difficulty" id="difficulty">
                <option disabled value="" selected="selected">Difficulté</option>
                @foreach ($difficulty as $key=>$diff)
                    @php(++$key)
                @if(old('difficulty') == $key)
                    <option value="{{$key}}" selected="choix">{{$diff->name}}</option>
                    @else
                        <option value="{{$key}}">{{$diff->name}}</option>

                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>