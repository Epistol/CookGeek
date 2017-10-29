<div class="field">
    <div class="control type-selector cc-selector">

        <div class="field-label" style="text-align: left;">
            <label class="title is-4">Type </label>
        </div>


        <div class="columns">


            @foreach ($types as $key=>$type)
                @php(++$key)
                <div class="column">

                    <label class="radio">

                        <input type="radio" id="{{$type->name}}" name="type">
                        <label class="drinkcard-cc {{$type->name}}" for="{{$type->name}}"></label>
                        <p>
							<?php echo ucfirst($type->name);?>
                        </p>
                    </label>

                </div>

                @if($key == 4)
        </div> <div class="columns ">

            @endif
            @endforeach
        </div>
    </div>
</div>