<div class="field cook  is-clearfix">
    <label class="label"><i class="fas fa-thermometer-three-quarters" aria-hidden="true"></i><span class="timing">Temps de cuisson</span></label>
    <div class="field-body">
        <div class="field has-addons">
            <div class="control">
	            <?php
	            $total = $recette->cook_time;
	            if($total > 60) {
		            $heure = intval($total / 60);
		            $minute = $total - ($heure * 60);
	            } else {
		            $heure = 0;
		            $minute = $total;
	            }
	            ?>

                <input class="input" id="cook_heure" name="cook_heure" type="number" placeholder="0" value="{{$heure}}" min="0"
                       pattern="[0-9]">
            </div>
            <div class="control">
                <a class="button is-static">
                    heure(s)
                </a>

            </div>
        </div>
        <div class="field has-addons">
            <div class="control">
                <input class="input" id="cook_minute" name="cook_minute" type="number" placeholder="0" value="{{$minute}}" min="0"
                       pattern="[0-9]">
            </div>
            <div class="control">
                <a class="button is-static">
                    minute(s)
                </a>

            </div>
        </div>
    </div>

</div>
