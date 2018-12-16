<section class="bordered-cdg">
    <div class="columns">
        @foreach($univers as $univer)

            <div class="column is-2">
                <div class="card card-cdg">
                    <header class="card-header">
                        <p class="card-header-title">
                            <a href="/recette/{{$univer->name}}" class="texte_accueil">{{$univer->name}}</a>
                        </p>
                    </header>

                </div>
            </div>
        @endforeach
    </div>


</section>
