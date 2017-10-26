<div class="field">
    <div class="control type-selector cc-selector">


		<?php

		$types = array("anime", "art", "cartes", "comics", "gaming", "livres", "musique", "tv")

		?>
        <div class="columns is-mobile">


            @foreach ($types as $key=>$type)
                @php(++$key)
                <label class="radio">
                    <input type="radio" id="{{$type}}" name="type">
                    <label class="drinkcard-cc {{$type}}" for="{{$type}}"></label>
                </label>

                @if($key == 4)
                        </div> <div class="columns is-mobile">
                @endif

            @endforeach
        </div>
    </div>
</div>