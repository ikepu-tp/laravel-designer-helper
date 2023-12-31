<?php

namespace ikepu_tp\DesignerHelper\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FunctionCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if (!$this->routeIs(["*.store", "*.update"])) return [];
        return [
            "deps" => ["numeric", "nullable"],
            "name" => ["required", "string", "max:30"],
            "cat_id" => ["nullable", "string", "exists:func_categories,id"],
            "note" => ["nullable", "string",],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}