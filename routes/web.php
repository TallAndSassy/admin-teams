<?php
Route::middleware(['auth:sanctum', 'verified'])->get(
    '/admin/people/teams/{sublevels?}',
    [\TallModSassy\AdminTeams\Http\Controllers\PageController::class, 'getFrontView']
)->name('admin/users');
