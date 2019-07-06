<div class="field ">

    <div class="control ">
        <div class=" is-fullwidth">
            <h1 class="title">Difficulté</h1>
            <div class="checkboxes">

                @foreach ($difficulty as $key=>$diff)
                    @php(++$key)
                    <input class="is-checkradio" value="{{$key}}" id="diff{{$key}}" type="checkbox" name="diff">
                    <label for="diff{{$key}}">{{$diff->name}}</label>
                @endforeach
            </div>

        </div>
    </div>
</div>