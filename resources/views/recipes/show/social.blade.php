<div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
        <p class="control">
            <a class="button facebook" @click="showModal = true" >
                          <span class="icon is-small">
                   <i class="fab fa-facebook-f fa-fw  fa-lg"></i>

                          </span>
            </a>



        </p>
        <p class="control">
            <a class="button twitter ">
                          <span class="icon is-small">
                          <i class="fab fa-twitter" aria-hidden="true"></i>
                          </span>
            </a>
        </p>
        <p class="control">
            <a class="button pinterest ">
                          <span class="icon is-medium 	 ">
                      <i class="fab fa-pinterest-p fa-fw"></i>

                          </span>
            </a>
        </p>
        <p class="control">
            <a class="button tumblr " href="http://tumblr.com/widgets/share/tool?canonicalUrl={{url()->full()}}">
                          <span class="icon is-small">
                          <i class="fab fa-tumblr fa-fw" aria-hidden="true"></i>

                          </span>
            </a>
        </p>
    </div>
</div>
<modal v-if="showModal" @close="showModal = false" v-cloak>
    <h3 slot="header">Partage Facebook</h3>
    <p slot="body"><iframe src="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"></iframe> </p>
</modal>