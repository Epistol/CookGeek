<div class="columns">
    <div class="column ">
        <h2 class="title title-mini">
            @lang('recipe.video')
        </h2>
    </div>
</div>



@if(strpos($recette->video, 'https://www.youtube.com') !== false OR strpos($recette->video, 'https://youtu.be') !== false)
	<?php
	$yt = str_replace("watch?v=", "embed/", $recette->video);
	?>
    <div class="youtube-player">

    <iframe width="560" height="315" src="{{$yt}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>



@elseif(strpos($recette->video, 'www.dailymotion.com') !== false)
	<?php
	$daily = /*http://www.dailymotion.com/video/x6bfitr*/
		$recette->video;
	$daily = str_replace("video", "embed/video", $daily)
	?>
    <div class="dailymotion_player">
        <iframe src="{{$daily}}?autoPlay=1" allowfullscreen="" height="270" frameborder="0" width="480"></iframe>
    </div>


@else
    <div class="columns">
        <div class="column is-lateral">
            <p > {{str_limit($recette->video, 150, "...") }} </p>
        </div>
    </div>
@endif


