<?php

namespace TallModSassy\AdminTeams\Http\Livewire;

use Livewire\Component;

class TeamTrue extends \TallModSassy\AdminBaseTruthiness\Http\Livewire\InnerTrue
{
    public \App\Models\Team $someModel;
    public string $someModelName = \App\Models\Team::class;
    protected $viewRef = 'tassy::livewire.team-true';
    protected $rules = [
        'someModel.name' =>  'required|string|min:2|max:256'
    ];

    // Simple Crud Cluster - maybe simplify
    public string $itemLabel = 'Team';
    public string $knownGoodName;

     public function mount(int $id)
    {
        parent::mount($id);
        $this->knownGoodName = $this->someModel->name;
        $this->itemLabel = __('Team');
    }

    public function update(): bool
    {
        $validatedData = $this->validate();
        // Execution doesn't reach here if validation fails.

        $somethingToSave = $this->someModelName::find($this->db_id); // like: $s = $someModelName::find($this->db_id);
        $somethingToSave->name = $validatedData['someModel']['name'];


        // --- overriding defaultSave
        $b = $somethingToSave->save();
        if (!$b) {
            flash('Ouch: Nothing was saved for '.$somethingToSave->name)->error()->livewire($this);
            return false;
        } else {
            $this->isInState = 'reading';
            flash('Successfully updated to '.$somethingToSave->name)->success()->livewire($this);
            $this->knownGoodName = $somethingToSave->name;
            return true;
        }

    }


}
