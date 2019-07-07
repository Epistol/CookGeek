<div class="is-pulled-right">

    <div class="field has-addons">
        <p class="control">
            <a class="button tooltip is-tooltip-left like
                    " id="{{$recipe->id}}" verif="{{ csrf_token() }}" data-tooltip="Ajouter aux coups de coeur">
                  <span class="icon is-small">
                    <i class="material-icons">&#xE87E;</i>
                  </span>
            </a>
        </p>
        <p class="control">
            <a class="button tooltip is-tooltip-left" data-tooltip="@lang('common.print)'" href="javascript:window.print()">
                  <span class="icon is-small">
                   <i class="material-icons">&#xE8AD;</i>
                  </span>
            </a>
        </p>

        @if($recipe->id_user === Auth::id())
            {{--<p class="control">
                <a class="button tooltip is-tooltip-left" data-tooltip="Modifier" href="/recette/edit/{{$recipe->id}}">
                  <span class="icon is-small">
                  <i class="material-icons">mode_edit</i>
                  </span>
                </a>
            </p>--}}

        @endif


        <p class="control">
            <a class="button tooltip is-tooltip-left" data-tooltip="Partager">
                          <span class="icon is-small">
                            <i class="material-icons">&#xE80D;</i>
                          </span>
            </a>
        </p>

        <modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
            <h3 slot="header">Connexion requise</h3>
            <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
            <div slot="footer">
                <a class="button is-primary" href="/login">Connexion</a>
            </div>

        </modal>




    </div>
</div>


