<modal v-if="showModal" @keyup.esc="$emit('close')" @close="showModal = false" v-cloak>
    <h3 slot="header">Connexion</h3>
    <div slot="body">

        <div class="flex mb-4">
            <div class="flex-1 w-5/12 ">
                <div class="left-register">
                    <img src="{{asset('/img/chat_mascotte.png')}}" alt="" class="chat-hover">
                </div>
            </div>
            <div class="flex-1 w-2/5 ">
                <H1 class="title">Connexion</H1>

                <div class="blockcontent">
                    <div class="flex mb-4">
                        <div class="flex-1 w-3/4 is-offset-1">
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

                                <a class=" help" @click="showModal = true">
                                    Mot de passe oublié ?
                                </a>

                                <div class="field is-grouped is-grouped-right">
                                    <p class="control">
                                        <button class="button is-primary " data-sitekey="{{env("RECAPTCHA_SITE_KEY")}}"
                                                data-callback="SubmitFn">
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
</modal>