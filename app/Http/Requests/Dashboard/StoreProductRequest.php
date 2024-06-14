<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "category_id" => "required|exists:App\Models\Category,id",
            "name_ar" => "required",
            "name_en" => "required",
            "slug" => "required",
            "short_description_ar" => "required",
            "short_description_en" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "price" => "required",
            "selling_price" => "required",
            "qty" => "required",
            "tax" => "required",
            "meta_title" => "required",
            "description_ar" => "required",
            "description_en" => "required",
            "meta_keywords" => "required",
        ];

    }
}
