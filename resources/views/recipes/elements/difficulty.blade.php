<?php
$diff = DB::table('difficulty')->where('id', '=', $recipe->difficulty)->first();
?>
<div class="full-circle {{lcfirst($diff->name)}}">
    {{ucfirst($diff->name)}}
</div>
