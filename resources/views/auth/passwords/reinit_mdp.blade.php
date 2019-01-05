<modal v-if="showModal" @keyup.esc="$emit('close')" @close="showModal = false" v-cloak>
    <h3 slot="header">Mot de passe oublié ? </h3>
    <div slot="body">

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            @csrf
            <p>Vous allez recevoir un lien pour réinitialiser votre mot de passe par e-mail dès que vous aurez mis votre mail ici </p>
            <br />
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Adresse email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="input form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <br />

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button is-primary">
                        Réinitialiser le mot de passe
                    </button>
                </div>
            </div>
        </form>

    </div>


</modal>