<?php

namespace TallModSassy\AdminTeams\Http\Livewire\Cards;

class NumTeams extends \TallAndSassy\AppThemeBaseAdmin\Http\Livewire\Cards\SimpleStat
{
    public static string $viewRef = 'tassy::cards.num-teams';

    public string $title = "Number of Teams";
    public function render() {
        $this->title = "Number of ".__('Teams');
        $this->value = view("tassy::components.ui.looks.link-to",  [
            'href'=>'/admin/people/teams',
            'slot'=>\App\Models\Team::count(),
            'attributes'=>new \Illuminate\Support\Collection()])->render();

        return parent::render();
    }

}
