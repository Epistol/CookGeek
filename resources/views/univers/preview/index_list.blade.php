<section class="bordered-cdg">
    <div class="columns is-multiline">
        @foreach($univers->chunk(2) as $univchunk)
            <div class="column is-2">
                @foreach($univchunk as $univer)

                    <div class="card card-cdg">
                        <header class="card-header">
                            <p class="card-header-title">
                                <a href="/recette/{{$univer->name}}" class="texte_accueil">{{$univer->name}}</a>
                            </p>
                        </header>

                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
