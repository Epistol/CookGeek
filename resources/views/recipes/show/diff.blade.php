<p>@lang('recipe.diff') :</p>


<div class="dollarsum">
    @for ($i = 0; $i < $recette->difficulty; $i++)
        <i class="fas fa-star"></i>
    @endfor


</div>
