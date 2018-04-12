<div class="field ">

    <div class="control ">
        <div class=" is-fullwidth">
            <h1 class="title">Type de plat</h1>
            <div class="checkboxes">

                @foreach ($types_plat as $key=>$diff)
                    @php(++$key)

                    <input class="is-checkradio" value="{{$key}}" id="exampleCheckboxDefault{{$key}}" type="checkbox"
                           name="categ_plat">
                    <label for="exampleCheckboxDefault{{$key}}">{{$diff->name}}</label>
                @endforeach
            </div>

        </div>
    </div>
</div>