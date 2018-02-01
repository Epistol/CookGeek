<div class="field is-clearfix">

    <div class="control">
        <div class="lecout">

            <p>Coût de réalisation</p>

            <fieldset class="rating">

                @for($i = 3; $i >= 1;$i--)

                    <input type="radio" id="{{$i}}" value="{{$i}}" name="cost" />
                    <label class="cost button" for="{{$i}}">
                        <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                    </label>

                @endfor
            </fieldset>


        </div>
    </div>
</div>