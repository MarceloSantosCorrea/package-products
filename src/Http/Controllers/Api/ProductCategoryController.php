<?php

namespace Product\Http\Controllers\Api;

use ApiControllerTrait\Http\Controllers\Api\ControllerTrait;
use App\Http\Controllers\Controller;
use Product\Http\Requests\ProductCategoryRequest;
use Product\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    use ControllerTrait;

    protected $model;

    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }

    public function store(ProductCategoryRequest $request)
    {
        return response()->json(ProductCategory::create($request->all()));
    }

    public function show($uid)
    {
        return response()->json(ProductCategory::where(['uid' => $uid])->first());
    }

    public function update(ProductCategoryRequest $request, $uid)
    {
        if ($model = ProductCategory::where(['uid' => $uid])->first()) {
            $model->fill($request->all());
            $model->update();

            return response()->json($model);
        }

        return abort(404);
    }

    public function destroy($uid)
    {
        if ($model = ProductCategory::where(['uid' => $uid])->first()) {

            try {
                $model->delete();
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'messate' => $e->getMessage(),
                ]);
            }

            return response()->json($model);
        }

        return abort(404);
    }
}
