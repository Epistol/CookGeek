<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\RecipeLike
 *
 * @property int $id
 * @property int $id_recipe
 * @property int $id_user
 * @property float $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereIdRecipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RecipeLike whereUpdatedAt($value)
 */
	class RecipeLike extends \Eloquent {}
}

namespace App{
/**
 * App\Categunivers
 *
 * @property int $id
 * @property string $name
 * @property string|null $img_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categunivers whereName($value)
 */
	class Categunivers extends \Eloquent {}
}

namespace App{
/**
 * App\Signalements
 *
 * @property int $id
 * @property int $recipe_id
 * @property int|null $user_id
 * @property string|null $option
 * @property string|null $user_content
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereUserContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Signalements whereUserId($value)
 */
	class Signalements extends \Eloquent {}
}

namespace App{
/**
 * App\Recipes_steps
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $step_number
 * @property string $instruction
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps whereInstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipes_steps whereStepNumber($value)
 */
	class Recipes_steps extends \Eloquent {}
}

namespace App{
/**
 * App\TypeRecipe
 *
 * @property int $id
 * @property string $name
 * @property-read mixed $first_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeRecipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeRecipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeRecipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeRecipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeRecipe whereName($value)
 */
	class TypeRecipe extends \Eloquent {}
}

namespace App{
/**
 * App\UserRecompenses
 *
 * @property int $id
 * @property int $user_id
 * @property int $recompense_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses whereRecompenseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecompenses whereUserId($value)
 */
	class UserRecompenses extends \Eloquent {}
}

namespace App{
/**
 * App\Page
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $content
 * @property int $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App{
/**
 * App\Search
 *
 * @property int $id
 * @property string $search_text
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereSearchText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Search whereUserId($value)
 */
	class Search extends \Eloquent {}
}

namespace App{
/**
 * App\Univers
 *
 * @property int $id
 * @property string $name
 * @property int $first_creator
 * @property int $nb_recipes
 * @property string $picture
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereFirstCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereNbRecipes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Univers whereUpdatedAt($value)
 */
	class Univers extends \Eloquent {}
}

namespace App{
/**
 * App\Firewall
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firewall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firewall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firewall query()
 */
	class Firewall extends \Eloquent {}
}

namespace App{
/**
 * App\Recipe
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property int|null $difficulty
 * @property int|null $type
 * @property int|null $cost
 * @property int|null $prep_time
 * @property int|null $cook_time
 * @property int|null $rest_time
 * @property string|null $commentary_author
 * @property int|null $nb_guests
 * @property string|null $guest_type
 * @property int|null $univers
 * @property int|null $type_univers
 * @property int $id_user
 * @property int|null $vegetarien
 * @property int $nb_views
 * @property string|null $video
 * @property int $validated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $hashid
 * @property-read string $first_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe validated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereCommentaryAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereCookTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereDifficulty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereGuestType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereHashid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereNbGuests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereNbViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe wherePrepTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereRestTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereTypeUnivers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereUnivers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereValidated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereVegetarien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recipe whereVideo($value)
 */
	class Recipe extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property string $img
 * @property string $password
 * @property int $nb_visites
 * @property int $traitement_donnees
 * @property string|null $remember_token
 * @property array|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $banned_at
 * @property string|null $hashid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cog\Laravel\Ban\Models\Ban[] $bans
 * @property-read mixed $first_name
 * @property mixed $locale
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBannedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereHashid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNbVisites($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTraitementDonnees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Pictures
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $user_id
 * @property string $image_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $validated
 * @property-read mixed $first_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pictures whereValidated($value)
 */
	class RecipeImg extends \Eloquent {}
}

namespace App{
/**
 * App\UserRecipeLike
 *
 * @property int $id
 * @property int $user_id
 * @property int $recipe_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserRecipeLike whereUserId($value)
 */
	class UserRecipeLike extends \Eloquent {}
}

namespace App{
/**
 * App\Difficulty
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Difficulty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Difficulty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Difficulty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Difficulty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Difficulty whereName($value)
 */
	class Difficulty extends \Eloquent {}
}

