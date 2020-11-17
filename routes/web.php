<?php
Route::middleware(['auth:sanctum', 'verified'])->get(
    '/admin/people/teams/{sublevels?}',
    [\TallModSassy\AdminTeams\Http\Controllers\PageController::class, 'getFrontView']
    //[\TallAndSassy\PageGuide\Http\Controllers\Admin\BobController::class, 'getFrontView']
)->where('sublevels', '.*');

//Route::middleware(['auth:sanctum', 'verified'])
//    ->get(
//        '/admin/teams/{sublevels?}',
//        [TallModSassy\AdminTeams\Http\Controllers\PageController::class, 'getFrontView'] // syntax works w/ use Statement
//    )
//    ->where('sublevels', '.*');
