<section class="section" style="word-break: break-all;">
    <ul>
        @foreach($ingredients as $ingredient)
            <?php $name = \App\Ingredient::name($ingredient->id_ingredient);?>
            <li><a href="{{route('ingredient.show', strip_tags(clean($name))) }}"> {{strip_tags(clean($name))}}</a></li>
        @endforeach
    </ul>
</section>
