<?php
$media = DB::table('categunivers')->where('id', '=', $recipe->type_univers)->first();
?>

@if($media)
@if($media->name== 'tv')
    <a href="{{ route("media.show", strtolower($media->name)) }}"><div class="icones {{ strtolower($media->name) }} tooltip is-tooltip-right"
         data-tooltip="{{ strtolower($media->name) }} ">
    </div></a>

@else
    <a href="{{ route("media.show", strtolower($media->name)) }}"><div class="icones {{ strtolower($media->name) }} tooltip is-tooltip-right"
         data-tooltip="{{ ucfirst($media->name) }} ">
    </div></a>
@endif
@endif
