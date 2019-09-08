<div id="liste-etapes" style="margin-bottom: 2rem">

    <div class="flex mb-4">
        <div class="flex-1 w-8/12">
            <h2 class="title title-mini">
                @lang('recipe.steps')
            </h2>
        </div>
        <div class="flex-1 w-4/12">
            @include("recipes.show.social")
        </div>
    </div>

    <div class="flex mb-4 is-multiline">
        @forelse($recipe->steps()->get() as $step)
            <div class="flex-1 w-1/12 is-flex-top">
                <div class="step_number">
                    <span> {{ intval($step->step_number+1) }}</span>
                </div>
            </div>
            <div class="flex-1 w-11/12 is-lateral ">
                    <p > {{ strip_tags(app('profanityFilter')->filter($step->instruction)) }} </p>
            </div>
        @empty
        @endforelse
    </div>
</div>

