<div class="field">
    <div class="control type-selector cc-selector">


        <?php

            $types = array("anime", "art", "cartes", "comics", "gaming", "livres", "musique", "tv")

        ?>

        @foreach ($types as $type)
                <label class="radio">
                    <input type="radio" id="{{$type}}" name="type">
                    <label class="drinkcard-cc {{$type}}" for="{{$type}}"></label>
                </label>
        @endforeach

    </div>
</div>