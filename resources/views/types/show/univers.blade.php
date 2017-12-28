<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 26/11/2017
 * Time: 20:47
 */


    $univers = DB::table('univers')->where('id', $recette->univers)->first();
?>
<p class="is-brand show-recipe-title"> @lang("recipe.univers")</p>
{{$univers->name}}
