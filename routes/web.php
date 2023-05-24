<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Tournois
    Route::delete('tournois/destroy', 'TournoisController@massDestroy')->name('tournois.massDestroy');
    Route::resource('tournois', 'TournoisController');

    // Equipes
    Route::delete('equipes/destroy', 'EquipesController@massDestroy')->name('equipes.massDestroy');
    Route::resource('equipes', 'EquipesController');

    // Joueurs
    Route::delete('joueurs/destroy', 'JoueursController@massDestroy')->name('joueurs.massDestroy');
    Route::resource('joueurs', 'JoueursController');

    // Rencontre
    Route::delete('rencontres/destroy', 'RencontreController@massDestroy')->name('rencontres.massDestroy');
    Route::resource('rencontres', 'RencontreController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
