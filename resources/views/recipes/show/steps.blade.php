<div class="columns">
    <div class="column is-three-quarters">
        <h2 class="title">
            @lang('recipe.steps')
        </h2>
    </div>
    <div class="column">

    </div>

</div>



@forelse($steps as $step)
    <div class="step ">
        <div class="columns">
            <div class="column is-1 is-flex-top">
            <div class="step_number">
               <p> {{$step->step_number+1}}</p>
            </div>

            </div>
            <div class="column is-lateral " style="display:flex;align-items:center;">
                <div class="content">
                    <?php  $etape = app('profanityFilter')->filter($step->instruction);?>
                    <p>   {{ucfirst($etape)}}</p>
                </div>
            </div>
        </div>
    </div>


@empty
@endforelse