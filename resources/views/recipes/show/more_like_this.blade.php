<?php
// ALGO RECIPES LIKE IT
// LIMITE A 4

// two recipe from same categ and same type

$samecatsametype =  DB::table('recipes')->where('type', '=', $recette->type)
->where('univers', '=', $recette->univers)->inRandomOrder()->limit(4)
->get();

// one recipe from same type
$sametype =  DB::table('recipes')->where('type', '=', $recette->type)
->inRandomOrder()->limit(4)
->get();

// one recipe from same categuniv
$samecateg =  DB::table('recipes')->where('type_univers', '=', $recette->type_univers)
->inRandomOrder()->limit(4)
->get();

?>



