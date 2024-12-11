<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;

route::get('/skills',[skillController::class, 'getApiSkills'] );

route::post('/skills', [SkillController::class, 'createApiSkill']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
