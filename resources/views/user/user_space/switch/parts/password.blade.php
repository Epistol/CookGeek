<div class="field">
    <label class="label">Mot de passe actuel</label>
    <div class="control">
        <input class="input" type="password" name="mdp_now" placeholder="">
        <a class="help" href="/password/reset" >
            @lang('passwords.forgot')
        </a>
    </div>
</div>
<div class="field">
    <label class="label">Nouveau mot de passe</label>
    <div class="control">
        <password name="new_mdp"/>
    </div>
</div>
<div class="field">
    <label class="label">Vérifiez ce mot de passe</label>
    <div class="control">
        <input class="input" type="password" name="new_mdp" placeholder="">
        <password name="new_mdp_check"/>
    </div>
</div>