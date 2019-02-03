<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipe extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|max:255|regex:([A-Za-z0-9 ])',
            "step.*" => "string|required|regex:([A-Za-z0-9 ])",
            "difficulty" => "integer|required",
            "categ_plat" => "integer|required",
            "prep_heure" => "nullable|integer",
            "prep_minute" => "nullable|integer",
            "cook_heure" => "nullable|integer",
            "cook_minute" => "nullable|integer",
            "rest_heure" => "nullable|integer",
            "rest_minute" => "nullable|integer",
            "unite_part" => "nullable|integer",
            "value_part" => "nullable|string|regex:([A-Za-z0-9 ])",
            "comment" => "nullable|string|regex:([A-Za-z0-9 ])",
            "video" => "nullable|string|regex:([A-Za-z0-9 ])",
            "type" => "integer|required",
        ];
    }
}
