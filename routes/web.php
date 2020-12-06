<?php
// --- The Teams Page ---
Route::middleware(['auth:sanctum', 'verified'])->get(
    '/admin/people/teams/{sublevels?}',
    [\TallModSassy\AdminTeams\Http\Controllers\PageController::class, 'getFrontView']
)->where('sublevels', '.*');

// --- Team Modals ---
// closure as string
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/1234/{sublevels?}', // Hint: Sublevels is always important
//    function($asrParams) {return 'Placeholder for Team modal via Closure. id: '.$asrParams['team'];}
//)->where('sublevels', '.*');

// closure as view
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/1234/{sublevels?}', // Hint: Sublevels is always important
//    function($asrParams) {return view('tassy::admin.help.index');}
//)->where('sublevels', '.*');


// specified method
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Livewire\TeamTrue::class, 'render']
//)->where('sublevels', '.*');
//
//
// default method to simple controller
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Controllers\DefaultTempController::class] // ->render since default
//)->where('sublevels', '.*');

//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Controllers\DefaultTempController::class, 'render'] // ->render since specified
//)->where('sublevels', '.*');

//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Controllers\DefaultTempController::class, 'render2'] // ->render2 since specified
//)->where('sublevels', '.*');

//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Controllers\DefaultTempController::class, 'renderBody'] // ->renderBody since specified
//)->where('sublevels', '.*');

//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Controllers\DefaultTempController::class, 'renderFronts']// ->renderBody since we do this hacky swapping Fronts for Body
//)->where('sublevels', '.*');

// default method to livewire
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\App\Http\Livewire\DevDemo\PolledNumberDemo::class, 'renderSelfie']
//)->where('sublevels', '.*');


Route::middleware(['auth:sanctum', 'verified'])->any(
    '/admin/teams/team/{id}/view/ru/{sublevels?}', // Hint: Sublevels is always important
    [\TallModSassy\AdminTeams\Http\Livewire\TeamModalReadUpdate::class, 'renderModalSelfie']
)->where('sublevels', '.*');

Route::middleware(['auth:sanctum', 'verified'])->any(
    '/admin/teams/team/{id}/view/summary/{sublevels?}', // Hint: Sublevels is always important
    [\TallModSassy\AdminTeams\Http\Livewire\TeamModalSummary::class, 'renderModalSelfie']
)->where('sublevels', '.*');


Route::middleware(['auth:sanctum', 'verified'])->any(
    '/admin/teams/team/{id}/view/tabs/{sublevels?}', // Hint: Sublevels is always important
    [\TallModSassy\AdminTeams\Http\Livewire\TeamTabs::class, 'renderModalSelfie']
)->where('sublevels', '.*');


//
//// Swap Methods (Fronts becomes Body)
//Route::middleware(['auth:sanctum', 'verified'])->any(
//    '/admin/teams/team/{sublevels?}', // Hint: Sublevels is always important
//    [\TallModSassy\AdminTeams\Http\Livewire\TeamTrue::class, 'AdminFronts']
//)->where('sublevels', '.*');


