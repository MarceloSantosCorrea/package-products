<?php

namespace Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
        $rules = [];
        switch ($this->method()) {
            case "POST":
                $rules["name"] = "required|unique:".config('products.tables.product_categories.name').",name";
                break;

            case "PUT":
                $param = $this->route('product_category');
                $id    = is_object($param) ? $param->id : $param;

                $rules["name"] = "required|unique:".config('products.tables.product_categories.name').",".$id;
                break;
        }

        return $rules;
    }
}
