<div id="liste-etapes" style="margin-bottom: 2rem">

    <div class="flex mb-4">
        <div class="flex-1 is-8">
            <h2 class="title title-mini">
                @lang('recipe.steps')
            </h2>
        </div>
        <div class="flex-1 is-4">
            @include("recipes.show.social")
        </div>
    </div>

    <div class="flex mb-4 is-multiline">
        @forelse($recipe->steps()->get() as $step)
            <div class="flex-1 is-1 is-flex-top">
                <div class="step_number">
                    <span> {{ intval($step->step_number+1) }}</span>
                </div>
            </div>
            <div class="flex-1 is-11 is-lateral ">
                    <p > {{ strip_tags(clean(app('profanityFilter')->filter($step->instruction))) }} </p>
            </div>
        @empty
        @endforelse
    </div>
</div>

