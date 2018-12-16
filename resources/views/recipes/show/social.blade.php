<div class="sharing-block">
    <div class="field has-addons" style="margin-left: 1rem">
		<?php $univers = DB::table('univers')->where('id', $recette->univers)->first(); ?>
        <socialshare url="{{url()->current()}}"></socialshare>
    </div>
</div>
