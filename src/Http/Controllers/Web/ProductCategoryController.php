<?php

namespace Product\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Product\Http\Requests\ProductCategoryRequest;
use Product\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(ProductCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('Show Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Product\Http\Requests\ProductCategoryRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        return response(ProductCategory::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        return response(ProductCategory::where(['uid' => $uid])->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response('Show Form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $uid)
    {
        if ($model = ProductCategory::where(['uid' => $uid])->first()) {
            $model->fill($request->all());
            $model->update();

            return response($model);
        }

        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
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

            return response($model);

        }

        return abort(404);
    }
}
