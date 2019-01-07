<section class="ingredients">

    <h2 class="title is-4">Etapes</h2>


    <stepsedit recipe_id="{!!  $recette->id!!}"></stepsedit>
    <span v-cloak>
         <span v-show="errors.has('step[]')" class="help is-danger">@lang('errors.step')</span>
    </span>


</section>




