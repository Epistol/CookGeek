<div class="field">
    <label class="label">Pseudo </label>
    <div class="control">
        <input class="input" type="text" name="pseudo" value="{{Auth::user()->name}}">
    </div>
</div>
<div class="field">
    <label class="label">Email</label>
    <div class="control">
        <input class="input" type="text" name="mail" value="{{Auth::user()->email}}">
    </div>
</div>
<div class="field">
    <label class="label">Mot de passe</label>
    <div class="control">
        <input class="input" type="password" name="mdp"  placeholder="">
    </div>
</div>