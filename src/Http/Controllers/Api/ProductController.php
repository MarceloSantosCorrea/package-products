<?php

namespace Product\Http\Controllers\Api;

use ApiControllerTrait\Http\Controllers\Api\ControllerTrait;
use App\Http\Controllers\Controller;
use Product\Http\Requests\ProductRequest;
use Product\Models\Product;

class ProductController extends Controller
{
    use ControllerTrait;

    protected $model;
    protected $relationships;

    public function __construct(Product $model)
    {
        $this->model         = $model;
        $this->relationships = ['category'];
    }

    public function store(ProductRequest $request)
    {
        return response()->json(Product::query()->create($request->all()));
    }

    public function show($uid)
    {
        return response()->json(Product::query()->where(['uid' => $uid])->with($this->relationships)->first());
    }

    public function update(ProductRequest $request, $uid)
    {
        if ($model = Product::query()->where(['uid' => $uid])->first()) {
            $model->fill($request->all());
            $model->update();

            return response()->json($model);
        }

        return abort(404);
    }

    public function destroy($uid)
    {
        try {
            $model = Product::query()->where(['uid' => $uid])->firstOrFail();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'messate' => $e->getMessage(),
            ]);
        }

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
}
