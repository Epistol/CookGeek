<h1 class="title">Inscriptions BETA Geek Faeries 2018</h1>
<p>Bonjour ! Vous souhaitez rejoindre la bêta fermée de Cuisine De Geek ? Renseignez votre mail ci-dessous !<br/>
Pas de pub ! Et des bonbons en récompense ! </p>


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif



<form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST"
      action="{{ route('form.store') }}">
{{ csrf_field() }}

    <div class="flex mb-4">
        <div class="flex-1">


            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input " name="email" type="email" placeholder="hello@">
                    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>

                </div>
                {{--<p class="help is-danger">Cet email est invalide ! </p>--}}
            </div>



            <div class="field">
                <label class="label">Suggestions</label>
                <div class="control">
                    <textarea class="textarea" name="contenu" placeholder="Une suggestion ? Des idées de recettes ? Venez vous exprimer ici "></textarea>
                </div>
            </div>



            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary is-medium">C'est parti !</button>
                </div>

            </div>

        </div>
    </div>


</form>