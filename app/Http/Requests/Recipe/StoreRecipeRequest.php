<?php

namespace App\Http\Requests;


/**
 * @property mixed resume
 */
class StoreRecipeRequest extends BaseFormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('add_recipes');
    }

    /**
     *  Validation rules to be applied to the input.
     *
     */
    public function rules()
    {
        return [
            'title'       => 'bail|required|string|max:255',
            'step.*'      => 'required|string',
            'difficulty'  => 'integer|required',
            'categ_plat'  => 'integer|required',
            'prep_heure'  => 'nullable|integer',
            'prep_minute' => 'nullable|integer',
            'cook_heure'  => 'nullable|integer',
            'cook_minute' => 'nullable|integer',
            'rest_heure'  => 'nullable|integer',
            'rest_minute' => 'nullable|integer',
            'unite_part'  => 'nullable|integer',
            'value_part'  => 'nullable|string',
            'comment'     => 'nullable|string',
            'video'       => 'nullable|url',
            'univers'     => 'nullable|string',
            'type'        => 'integer|required',
            'resume'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'title'      => 'trim|strip_tags|escape',
            'step'       => 'trim|strip_tags|escape',
            'value_part' => 'trim|strip_tags|escape',
            'comment'    => 'trim|strip_tags|escape',
        ];
    }
}
