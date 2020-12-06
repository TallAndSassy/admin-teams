<?php


namespace TallModSassy\AdminTeams\Http\Livewire;


class TeamModalSummary extends
    \Livewire\Component
    implements \TallAndSassy\PageGuide\LivewireSelfieInterface
{

//    you left off wanting to create a whole new modal to call that had tabs, with this being one of the tab
//1) make a Team Summary modal: Name. Num Members.
//2) Make Tab modal with simple text
//3) Put Team Edit in one tab
//4) Put Team Summary in other tab
//5) Make more reusable.
//6) Add team modal to users page.
//
//7) Put into page-guide.
    public string $name = 'tbd';
    public int $numMembers = -1;
    public int $accountBalanceCents = -1;
    public int $myId;


    public function mount(int $id)
    {

        $this->myId = $id;
        $sql = <<<EOD
        SELECT
            count(id)
        FROM
            team_user
        WHERE
            team_id = '$id'
        EOD;

        $this->numMembers = (\StWip\ChaosUtils\EtConfig::$GJjrDbConn->getVal($sql) + 1); // Every team has the owner, but 'other' members, and only other members, are listed in the team_user table

    }


    public function render()
    {
        return view('tassy::livewire.team-modal-summary');
    }


    // LivewireSelfieInterface
    public function renderModalSelfie(array $asrParams)
    {
        dd([__FILE__,__LINE__,__METHOD__,$asrParams]);
        return view('livewire-selfie', [
            'livewireName' => 'tassy::team-modal-summary',
            'asrParams' => $asrParams,
            'id' => $asrParams['id'],
        ]);
    }


}

