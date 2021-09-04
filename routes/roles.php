<?php


Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
