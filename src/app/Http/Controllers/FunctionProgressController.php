<?php

namespace ikepu_tp\DesignerHelper\app\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use ikepu_tp\DesignerHelper\app\Http\Requests\FunctionProgressRequest;
use ikepu_tp\DesignerHelper\app\Models\Func_category;
use ikepu_tp\DesignerHelper\app\Models\Func_progress;

class FunctionProgressController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(FunctionProgressRequest $functionProgressRequest)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FunctionProgressRequest $functionProgressRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FunctionProgressRequest $functionProgressRequest, Func_progress $func_progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FunctionProgressRequest $functionProgressRequest, Func_progress $func_progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FunctionProgressRequest $functionProgressRequest, Func_progress $func_progress)
    {
        //
    }
}