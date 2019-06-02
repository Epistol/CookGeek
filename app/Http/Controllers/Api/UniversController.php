<?php

namespace App\Http\Controllers\Api;

use App\Categunivers;
use App\Difficulty;
use App\Http\Controllers\Controller;
use App\Signalements;
use App\TypeRecipe;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RecipeController
 * @package App\Http\Controllers\Api
 */
class UniversController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function getMediasTypes()
    {
        $types = Categunivers::all();
        return response()->json($types);
    }

}
