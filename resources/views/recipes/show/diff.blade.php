<p>@lang('recipe.difficulty') :</p>


<div class="dollar-sum">
    @for ($i = 0; $i < $recipe->difficulty; $i++)
        <i class="fas fa-star"></i>
    @endfor


</div>
