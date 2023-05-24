<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Equipes
    Route::apiResource('equipes', 'EquipesApiController');

    // Joueurs
    Route::apiResource('joueurs', 'JoueursApiController');
});
