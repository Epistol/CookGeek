<?php
$diff = DB::table('difficulty')->where('id', '=', $recette->difficulty)->first();
?>
<div class="full-circle {{lcfirst($diff->name)}}">
    {{ucfirst($diff->name)}}
</div>
