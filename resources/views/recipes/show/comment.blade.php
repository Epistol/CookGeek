@if($recipe->commentary_author)
    <div class="container">
        <p>{{strip_tags($recipe->commentary_author)}}</p>
    </div>

@endif