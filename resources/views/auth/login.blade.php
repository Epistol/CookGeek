@extends('layouts.app')
@section('titrepage', "Connexion")
@section('content')
    <section class="section">

        <div class="container">
            <div class="columns">
                <div class="column is-5 is-paddingless">
                    <div class="left_register">
                        <img src="{{asset('/img/chat_mascotte.png')}}" alt="" class="chat_hover">
                    </div>

                </div>
                <div class="column is-two-fifths is-paddingless">
                    <H1 class="title">Connexion</H1>

                    <div class="blockcontent">
                        <div class="columns">
                            <div class="column is-three-quarters is-offset-1">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}


                                    {{--   <a href="fb.com" class="button">Facebook</a>
                                       <a href="fb.com" class="button">Google</a>
                                       <a href="fb.com" class="button">Twi</a>

                                       <div class="is-divider" data-content="OU"></div>--}}


                                    <div class=" field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="label col-md-4 control-label">Pseudo ou Email

                                        </label>
                                        <div class="control">
                                            <input id="email" type="email" class="input form-control" name="email"
                                                   value="{{ old('email') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                    <div class="field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Mot de passe</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="input form-control"
                                                   name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <a class=" help" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>

                                    <div class="field is-grouped is-grouped-right">
                                        <p class="control">
                                            <button type="submit" class="button is-primary">
                                                Connexion
                                            </button>
                                        </p>
                                        {{-- <p class="control">
                                             <a class="button is-light">
                                                 Cancel
                                             </a>
                                         </p>--}}
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="section">
        <div class="container blockcontent">
            <h3>Données personnelles </h3>
            <hr>
            <p>Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par <strong>Cuisine
                    De Geek </strong>pour <strong>la gestion de nos utilisateurs et le bon fonctionnement du
                    site. </strong>Déclaration CNIL N° 2090167.</p>
            <p>Elles sont conservées pendant<strong> 18 mois en actif, 5 ans en sauvegarde inactive </strong>et sont
                destinées<strong> au service informatique, au service marketing et au service commercial
                    établis</strong></p>
            <p>Conformément à la <a href="https://www.cnil.fr/fr/loi-78-17-du-6-janvier-1978-modifiee" target="_blank"
                                    data-saferedirecturl="https://www.google.com/url?hl=fr&amp;q=https://www.cnil.fr/fr/loi-78-17-du-6-janvier-1978-modifiee&amp;source=gmail&amp;ust=1514736936862000&amp;usg=AFQjCNFJup05WHfX6t8K75RHfOHK91d0Pw">loi
                    « informatique et libertés »</a>, vous pouvez exercer votre droit d&#39;accès aux données vous
                concernant et les faire rectifier en contactant : <strong>Epistol.fr : <a
                            href="mailto:contact@epistol.fr" target="_blank">contact@epistol.fr</a></strong></p>
            <p> Nous vous informons de l’existence de la liste d&#39;opposition au démarchage téléphonique « Bloctel »,
                sur laquelle vous pouvez vous inscrire ici : <a href="https://conso.bloctel.fr/" target="_blank"
                                                                data-saferedirecturl="https://www.google.com/url?hl=fr&amp;q=https://conso.bloctel.fr/&amp;source=gmail&amp;ust=1514736936862000&amp;usg=AFQjCNGL2Dq18-InVw4lwflOMmtneGOfxg">https://conso.bloctel.fr/</a>
            </p>

        </div>

    </section>

@endsection
