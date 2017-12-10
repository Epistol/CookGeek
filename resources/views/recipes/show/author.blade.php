Auteur :

<?php

$id_auteur = $recette->id_user;
$nom = DB::table('users')->where('id', $id_auteur)->value('name');


        ?>
<a href="/user/{{$nom}}">{{$nom}}</a>
