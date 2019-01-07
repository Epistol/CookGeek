<div class="columns">
    <div class="column is-8 is-offset-1">
        <h2 class="title mini_title">
            @lang('recipe.steps')
        </h2>
    </div>
    <div class="column">
        @include("recipes.show.social")
    </div>

</div>

<div class="columns">
    <div class="column">
        @forelse($steps as $step)

            <div class="columns">
                <div class="column is-1 is-flex-top">
                    <div class="step_number">
                        <p> {!! $step->step_number+1 !!}</p>
                    </div>

                </div>
                <div class="column is-lateral ">
                    <div class="content">
						<?php  $etape = app('profanityFilter')->filter($step->instruction);?>
                        <p class="instruction">   {!! ucfirst($etape )!!}</p>
                    </div>
                </div>
            </div>

        @empty
        @endforelse


    </div>
</div>

