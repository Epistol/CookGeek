<div class="field ">
    <div class="control">
        <div class="select is-fullwidth">
            <select required name="difficulty" id="difficulty">
                <option disabled value="" >Difficulté</option>
                @foreach ($difficulty as $key=>$diff)
                    @php(++$key)
                    <option   name="categ_plat" {{ $key === $recette->difficulty ? "selected":"" }}  value="{{$key}}">{{$diff->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>