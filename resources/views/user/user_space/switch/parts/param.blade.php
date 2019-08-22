<form class="form-horizontal recipe-add" enctype="multipart/form-data" method="POST" id="params"
      action="{{ route('param.store') }}">
    @csrf
    <div class="flex mb-4 ">
        {{--Photo profil--}}
        {{--Infos classique--}}
        <div class="flex-1">
            <div class="field">
                <label class="label">@lang('account.pseudo.pseudo')</label>
                <div class="control">
                    <input class="input" type="text" name="pseudo"
                           @if(isset(Auth::user()->pseudo))
                           value="{{Auth::user()->pseudo}}"
                            @endif
                    >
                    <p class="help">@lang('account.pseudo.sub')</p>
                </div>
            </div>
            <div class="field">
                <label class="label">@lang('account.email.mail')</label>
                <div class="control">
                    <input class="input" type="text" name="mail" value="{{Auth::user()->email}}">
                    <p class="help">@lang('account.email.sub')</p>
                </div>
            </div>
            @include('user.user_space.password.check_psw')
            {{--            @include('user.user_space.switch.parts.password')--}}
            <div class="is-flex-center">
                <div class="field is-grouped">
                    <div class="control">
                        <validationform><span slot="text">@lang('common.save')</span></validationform>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 w-4/12">
            @include("user.user_space.switch.parts.informations.avatar")
        </div>
    </div>

</form>