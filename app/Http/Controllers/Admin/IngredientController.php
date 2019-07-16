<?php

namespace App\Http\Controllers\Admin;

use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

    public function index()
    {
        $ingredients = Ingredient::with('recipes')->paginate(25);
        return view('admin.ingredients.index', compact('ingredients'));
    }

    public function deleteDuplicates()
    {
        $ingredients = DB::table('ingredients')->groupBy('name', 'lang')
            ->pluck('id')->toArray();
        $ingredientsDuplicated = Ingredient::whereNotIn('id', $ingredients)->delete();
        if ($ingredientsDuplicated) {
            return redirect(route('admin.ingredient.index'))
                ->with('session', $ingredientsDuplicated . ' ingrédients supprimés');
        }
        return redirect(route('admin.ingredient.index'));
    }
}
