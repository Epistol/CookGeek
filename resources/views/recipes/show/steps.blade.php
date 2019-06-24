<div id="liste-etapes" style="margin-bottom: 2rem">

    <div class="columns">
        <div class="column is-8">
            <h2 class="title title-mini">
                @lang('recipe.steps')
            </h2>
        </div>
        <div class="column is-4">
            @include("recipes.show.social")
        </div>
    </div>

    <div class="columns">
        <div class="column">
            @forelse($recipe->steps()->get() as $step)
                <div class="columns">
                    <div class="column is-1 is-flex-top">
                        <div class="step_number">
                            <span> {{ intval($step->step_number+1) }}</span>
                        </div>
                    </div>
                    <div class="column is-lateral ">
                        <div class="content">
                            <?php  $etape = app('profanityFilter')->filter($step->instruction);?>
                            <p class="instruction"> {{ strip_tags(clean($etape)) }} </p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

