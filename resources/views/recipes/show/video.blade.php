@if($recipe->video)

    <div class="flex mb-4">
        <div class="flex-1 ">
            <h2 class="title title-mini">
                @lang('recipe.video')
            </h2>
        </div>
    </div>



    @if(strpos($recipe->video, 'https://www.youtube.com') !== false OR strpos($recipe->video, 'https://youtu.be') !== false)
        <?php
        $yt = str_replace("watch?v=", "embed/", $recipe->video);
        ?>
        <div class="youtube-player">

            <iframe width="560" height="315" src="{{$yt}}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

        </div>



    @elseif(strpos($recipe->video, 'www.dailymotion.com') !== false)
        <?php
        $daily = /*http://www.dailymotion.com/video/x6bfitr*/
            $recipe->video;
        $daily = str_replace("video", "embed/video", $daily)
        ?>
        <div class="dailymotion_player">
            <iframe src="{{$daily}}?autoPlay=1" allowfullscreen="" height="270" frameborder="0" width="480"></iframe>
        </div>


    @else
        <div class="flex mb-4">
            <div class="flex-1 is-lateral">
                <p> {{str_limit($recipe->video, 150, "...") }} </p>
            </div>
        </div>
    @endif


@endif