<div class="field">
    <div class="control type-selector cc-selector">

        <div class="field-label" style="text-align: left;">
            <label class="title is-4">Type </label>
        </div>

		<?php
// A ajouter en BDD
		$types = array("anime", "art", "cartes", "comics", "gaming", "livres", "musique", "tv")

		?>
        <div class="columns is-mobile">


            @foreach ($types as $key=>$type)
                @php(++$key)
            <div class="column">

                <label class="radio">

                    <input type="radio" id="{{$type}}" name="type">
                    <label class="drinkcard-cc {{$type}}" for="{{$type}}"></label>
                    <p>
		                <?php echo ucfirst($type);?>
                    </p>
                </label>

            </div>

                @if($key == 4)
             </div> <div class="columns is-mobile">

            @endif
            @endforeach
        </div>
    </div>
</div>