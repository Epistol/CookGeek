<div class="is-pulled-right is-flex">

    <like-recipe :recipeid="'{{$recette->id}}'" :userid="'{{ Auth::id() }}'"></like-recipe>

    <a class="button tooltip is-tooltip-left print" data-tooltip="Imprimer" href="javascript:window.print()">
                  <span class="icon is-small">
                   <i class="material-icons">&#xE8AD;</i>
                  </span>
    </a>

    @include("recipes.show.type_univers")


    <modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
        <h3 slot="header">Connexion requise</h3>
        <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
        <div slot="footer">
            <a class="button is-primary" href="/login">Connexion</a>
        </div>

    </modal>




</div>


