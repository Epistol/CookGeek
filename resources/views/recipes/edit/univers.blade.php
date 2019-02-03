<div class="columns">
    <div class="column is-3" style="text-align: left;">
        <label class="title is-4 is-">Univers</label>
    </div>
    <div class="column">
        @if(isset($univers->name))
        <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="{{strip_tags(clean($univers->name))}}">
            @else
            <input class="input_modal blck" type="text" placeholder="" name="universe" id="universe" value="">
        @endif
    </div>
</div>