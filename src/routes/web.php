<?php

use ikepu_tp\DesignerHelper\app\Http\Controllers\FunctionCategoryController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\FunctionClassController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\FunctionController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\FunctionProgressController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\FunctionUserController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\ProjectController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\ScreenClassController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\ScreenController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\ScreenProgressController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\TableDetailController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\TableOutlineController;
use ikepu_tp\DesignerHelper\app\Http\Controllers\TableSettingController;
use ikepu_tp\DesignerHelper\app\Http\Middleware\DesignerMiddleware;
use Illuminate\Support\Facades\Route;

Route::scopeBindings()->prefix("designers")->middleware([
    DesignerMiddleware::class,
])->group(function () {
    Route::prefix("v1")->group(function () {
        Route::prefix("projects/{project}")->group(function () {
            Route::prefix("tables")->group(function () {
                Route::apiResource("settings", TableSettingController::class)->names("table.setting");
                Route::apiResource("outlines", TableOutlineController::class)->names("table.outline");
                Route::apiResource("details", TableDetailController::class)->names("table.detail");
            });
            Route::prefix("functions")->group(function () {
                Route::apiResource("categories", FunctionCategoryController::class)->names("function.category");
                Route::apiResource("classes", FunctionClassController::class)->names("function.class");
                Route::apiResource("progresses", FunctionProgressController::class)->names("function.progress");
                Route::apiResource("users", FunctionUserController::class)->names("function.user");
                Route::apiResource("", FunctionController::class)->parameters(["" => "function"])->names("function");
            });
            Route::prefix("screens")->group(function () {
                Route::apiResource("classes", ScreenClassController::class)->names("screen.class");
                Route::apiResource("progresses", ScreenProgressController::class)->names("screen.progress");
                Route::apiResource("", ScreenController::class)->parameters(["" => "screen"])->names("screen");
            });
        });
        Route::apiResource("projects", ProjectController::class)->names("project");
    });
});