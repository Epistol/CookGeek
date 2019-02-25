<?php

namespace App\Http\Requests;

use Waavi\Sanitizer\Laravel\SanitizesInput;

class RecipeStoreSanitizedRequest extends BaseFormRequest
{
    use SanitizesInput;

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
     *  Validation rules to be applied to the input.
     *
     */
    public function rules()
    {
        return [
            'title'       => 'bail|required|escape|string|strip_tags|max:255|regex:([A-Za-z0-9 ])',
            'step.*'      => 'required|string|strip_tags|escape|regex:([A-Za-z0-9 ])',
            'difficulty'  => 'integer|required',
            'categ_plat'  => 'integer|required',
            'prep_heure'  => 'nullable|integer',
            'prep_minute' => 'nullable|integer',
            'cook_heure'  => 'nullable|integer',
            'cook_minute' => 'nullable|integer',
            'rest_heure'  => 'nullable|integer',
            'rest_minute' => 'nullable|integer',
            'unite_part'  => 'nullable|integer',
            'value_part'  => 'nullable|string|regex:([A-Za-z0-9 ])',
            'comment'     => 'nullable|string|regex:([A-Za-z0-9 ])',
            'video'       => 'nullable|string|regex:([A-Za-z0-9 ])',
            'type'        => 'integer|required',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     *  @return void
     */
    public function filters()
    {
        return [];
    }
}
