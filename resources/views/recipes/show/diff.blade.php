<p>@lang('recipe.diff') :</p>


<div class="dollar-sum">
    @for ($i = 0; $i < $recette->difficulty; $i++)
        <i class="fas fa-star"></i>
    @endfor


</div>
