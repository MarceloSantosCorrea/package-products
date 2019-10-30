<?php

namespace Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                $rules["name"] = "required|unique:".config('products.tables.products.name').",name";

                $rules[config('products.tables.product_categories.foreign')] = "required";
                break;

            case "PUT":
                $param = $this->route('product');
                $id    = is_object($param) ? $param->id : $param;

                $rules["name"] = "required|unique:".config('products.tables.products.name').",".$id;

                $rules[config('products.tables.product_categories.foreign')] = "required";
                break;
        }

        return $rules;
    }
}
