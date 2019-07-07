@if($recipe->commentary_author)
    <div class="container">
        <p>{{strip_tags(clean($recipe->commentary_author))}}</p>
    </div>

@endif