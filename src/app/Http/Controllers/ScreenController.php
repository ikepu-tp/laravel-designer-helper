<?php

namespace ikepu_tp\DesignerHelper\app\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use ikepu_tp\DesignerHelper\app\Http\Requests\ScreenRequest;
use ikepu_tp\DesignerHelper\app\Models\Screen;

class ScreenController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ScreenRequest $screenRequest)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScreenRequest $screenRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ScreenRequest $screenRequest, Screen $screen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScreenRequest $screenRequest, Screen $screen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScreenRequest $screenRequest, Screen $screen)
    {
        //
    }
}