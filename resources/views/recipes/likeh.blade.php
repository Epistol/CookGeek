<div class="is-pulled-right is-flex">

    <LikeRecipe :recipeid="'{{$recette->id}}'" :userid="'{{ Auth::id() }}'"></LikeRecipe>

    <a class="button tooltip is-tooltip-left print" data-tooltip="Imprimer" href="javascript:window.print()">
                  <span class="icon is-small">
                   <i class="material-icons">&#xE8AD;</i>
                       <span hidden>@lang('common.print')</span>
                  </span>

    </a>

    @include("recipes.show.media")


    <modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
        <h3 slot="header">Connexion requise</h3>
        <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
        <div slot="footer">
            <a class="button is-primary" href="/login">Connexion</a>
        </div>

    </modal>




</div>


