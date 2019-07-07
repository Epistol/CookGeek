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
            <a class="button tooltip is-tooltip-left" data-tooltip="Imprimer" href="javascript:window.print()">
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


        {{-- ON click share :

         <p class="control">
             <a class="button tooltip is-tooltip-bottom" data-tooltip="Partager sur FB" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}">
                   <span class="icon is-small">
                     <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                   </span>
             </a>
         </p>
         <p class="control">
             <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-show-count="false" class="button tooltip is-tooltip-bottom twitter-share-button" data-tooltip="Partager sur Twitter">
                   <span class="icon is-small">
                     <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                   </span>
             </a>
             <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </p>
         --}}{{-- TODO : Share tumblr & pinterest--}}{{--
         <p class="control">
             <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-show-count="false" class="button tooltip is-tooltip-bottom twitter-share-button" data-tooltip="Partager sur Twitter">
                   <span class="icon is-small">
                     <i class="fa fa-tumblr fa-2x" aria-hidden="true"></i>
                   </span>
             </a>
             <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </p>
         <p class="control">
             <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-show-count="false" class="button tooltip is-tooltip-bottom twitter-share-button" data-tooltip="Partager sur Twitter">
                   <span class="icon is-small">
                     <i class="fa fa-pinterest-p fa-2x" aria-hidden="true"></i>
                   </span>
             </a>
             <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
         </p>--}}

    </div>
</div>


