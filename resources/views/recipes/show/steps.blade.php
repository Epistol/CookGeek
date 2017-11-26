<div class="columns">
    <div class="column is-three-quarters">
        <h2 class="title">
            @lang('recipe.steps')
        </h2>
    </div>


</div>




@forelse($steps as $step)
    <div class="step">
        <div class="columns">
            <div class="column is-1 is-flex-center">
            <span class="">
                {{$step->step_number+1}}
            </span>

            </div>
            <div class="column is-lateral "  style="display:flex;align-items:center;">
                <div class="content">
                    <p>   {{ucfirst($step->instruction)}}</p>
                </div>
            </div>
        </div>
    </div>


@empty
@endforelse