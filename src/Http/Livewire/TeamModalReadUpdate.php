<?php



namespace  TallModSassy\AdminTeams\Http\Livewire;


class TeamModalReadUpdate
    extends \TallModSassy\AdminBaseTruthiness\Http\Livewire\InnerTrue
    implements \TallAndSassy\PageGuide\LivewireSelfieInterface
{

      public \App\Models\Team $someModel;
    public string $someModelName = \App\Models\Team::class;

    protected $viewRef = 'tassy::livewire.team-modal-read-update';
//    you left off wanting to create a whole new modal to call that had tabs, with this being one of the tab
//1) make a Team Summary modal: Name. Num Members.
//2) Make Tab modal with simple text
//3) Put Team Edit in one tab
//4) Put Team Summary in other tab
//5) Make more reusable.
//6) Add team modal to users page.
//
//7) Put into page-guide.
    protected $rules = [
        'someModel.name' =>  'required|string|min:2|max:256'
    ];

    // Simple Crud Cluster - maybe simplify
    public string $itemLabel = 'Team';
    public string $knownGoodName;

     public function mount(?int $id = null, ?array $asrParams = null)
    {

        assert(!empty($id) || $asrParams);
        if (empty($id)) {
             dd([__FILE__,__LINE__,__METHOD__,$id,$asrParams,"
        JJ you left off tracing back on how to pass the route id to these tabs.
    Not sure yet if its a \TallAndSassy\PageGuide\Components\LeSwappableChunk:: limitation
    or I'm just doing it wrong.'"]);
            assert(isset($asrParams['id']));
            $id = $asrParams['id'];
        }
        parent::mount($id);
        $this->knownGoodName = $this->someModel->name;
        $this->itemLabel = __('Team');
        $this->redoTitle();
    }

    private function redoTitle() {
         $this->title = "{$this->itemLabel}: {$this->knownGoodName}";
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
            $this->redoTitle();
            return true;
        }
    }


//    public function render() {
//        #$this->_versionNumber = $this->_versionNumber+1;
//        #$this->versionNumber = "v".($this->prefix) .".". ($this->_versionNumber);
//        return view('tassy::livewire.wip-team-modal');
//    }

    // LivewireSelfieInterface
    public function renderModalSelfie(array $asrParams) {
         return view('livewire-selfie', ['livewireName'=>'tassy::team-modal-read-update', 'asrParams'=>$asrParams]);
    }
}

