<section class="ingredients">


    <div id="ingr">
        <draggable :options="{group:'people'}" @start="drag=true" @end="drag=false">

            <div class=" columns draggable" v-for="(row, index) in rows">


                {{--     // Title--}}
                <div class="column is-3" style="text-align: left;" v-if="index === 0">
                    <h2 class="title is-4">Ingredients</h2>
                </div>
                <div class="column is-3" style="text-align: left;" v-else="index !=  0">
                </div>

                {{--   Qtt + lib--}}
                <div class="column">
                    {{--<ingredient_form></ingredient_form>--}}
                </div>

            </div>
        </draggable>


        <span v-cloak>
         <span v-show="errors.has('ingredient[]')" class="help is-danger">@lang('errors.ingr')</span>
    </span>


    </div>

</section>
