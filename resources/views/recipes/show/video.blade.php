<div class="columns">
    <div class="column is-offset-1">
        <h2 class="title mini_title">
            @lang('recipe.video')
        </h2>
    </div>
</div>



@if(strpos($recette->video, 'https://www.youtube.com') !== false OR strpos($recette->video, 'https://youtu.be') !== false)
	<?php
	$yt = str_replace("watch?v=", "embed/", $recette->video)
	?>
    <div class="youtube_player">
        <iframe src="{{$yt}}" frameborder="0" gesture="media" allow="encrypted-media" class="video"
                allowfullscreen></iframe>
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

    <video width="320" height="240" controls>
        <source src="{{$recette->video}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endif


