<modal v-if="showModalLike" @close="showModalLike = false" v-cloak>
    <h3 slot="header">Connexion requise</h3>
    <p slot="body">Vous ne pouvez pas ajouter de recette en favori sans être connecté ! </p>
    <div slot="footer">
        <a class="button is-primary" href="/login">Connexion</a>
    </div>

</modal>