<div class="field">
    <label class="label">@lang('account.password_array.actual')</label>
    <div class="control">
        <input class="input" type="password" name="mdp_now" placeholder="">
        <a class="help" href="/password/reset" >
            @lang('passwords.forgot')
        </a>
    </div>
</div>
<div class="field">
    <label class="label">@lang('account.password_array.new')</label>
    <div class="control">
        <password name="new_mdp"/>
    </div>
</div>
<div class="field">
    <label class="label">@lang('account.password_array.confirm')</label>
    <div class="control">
        <password name="new_mdp_check"/>
    </div>
</div>