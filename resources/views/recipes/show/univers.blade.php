<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 26/11/2017
 * Time: 20:47
 */

$univers = DB::table('univers')->where('id', $recette->univers)->first();
?>
@if($univers !== null)
<p class="is-brand show-recipe-title"> @lang("recipe.univers")</p>
<a href="{{route('univers.show', $univers->id)}}" style="    color: #b87bc8;" >{{$univers->name}}</a>
@endif