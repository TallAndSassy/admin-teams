<?php


namespace TallModSassy\AdminTeams\Http\Livewire;

//
//class TeamTabs extends
//    \Livewire\Component
//    implements \TallAndSassy\PageGuide\LivewireSelfieInterface
//{
//
//    public string $name = 'tbd';
//    public int $myId;
//
//    public function mount(int $id)
//    {
//          $this->myId = $id;
//    }
//
//  public function getAsrTabs(): array
//    {
//        return $asrAsrNavTabs = [
//            'view.summary' => [
//                'title' => 'Summary',
//                'classes' => [],
//                'href' => 'view/summary',
//                'hint' => null,
//                'badge' => null,
//                'badgeClasses' => null,
//            ],
//            'view.ru' => [
//                'title' => 'Edit',
//                'classes' => [],
//                'href' => 'view/ru',
//                'hint' => null,
//                'badge' => null,
//                'badgeClasses' => null,
//            ]
//        ];
//
//    }
//    public function render()
//    {
//        $defaultTab = null;
//        $pageRoute = "tassy::admin/teams/id/{$this->myId}/view/ru";//"admin/teams/id/$id/view/ru",
//
//        $asrTabs = $this->getAsrTabs();
//           $defaultTab = ($defaultTab) ? $defaultTab : array_key_first($asrTabs);
//        $currentTab = $defaultTab;
//
//            $asrStuffMostlyForTabs = \StWip\Screens\NavTabHelper::prepForInclude($pageRoute, $asrTabs, $defaultTab );
//
//
//        return view('tassy::livewire.team-tabs', [
//            'asrStuffMostlyForTabs'=>$asrStuffMostlyForTabs,
//            'defaultTab'=>$defaultTab,
//            'pageRoute'=>$pageRoute]);
//    }
//
//
//    // LivewireSelfieInterface
//    public function renderModalSelfie(array $asrParams)
//    {
//        return view('livewire-selfie', ['livewireName' => 'tassy::team-tabs', 'asrParams' => $asrParams]);
//    }
//
//
//}
//

#namespace App\Http\Livewire\TabPlayground;

use Livewire\Component;

class TeamTabs extends \TallAndSassy\PageGuide\Components\LeSwappableChunk
{
    protected static string $chunkKey = 'crumb';
    public string $enumUrlType = 'updateOrAdd';
    public int $myId = 1; //TBD

    public function doSwap(string $chunkValue, string $chunkKey)
    {
        if ($chunkValue == 'home') {
            $this->pageRoute = 'admin/dashboard';
        } elseif ($chunkValue == 'about') {
            $this->pageRoute = 'admin/about';
        } elseif ($chunkValue == 'help') {
            $this->pageRoute = 'admin/help';
        } elseif ($chunkValue == 'summary') {
            $this->pageRoute = "admin/teams/id/1/view/summary";
        } elseif ($chunkValue == 'ru') {
            $this->pageRoute = "admin/teams/id/1/view/ru";
        } else {
            assert(0, "chunkValue($chunkValue) " . __FILE__ . __LINE__);
        }
        parent::doSwap($chunkValue, $chunkKey);
    }


    static function getAsrTabs(): array
    {
        $numUsers = \App\Models\User::count();
        return $asrAsrNavTabs = [
            'summary' => [
                'title' => 'Summary',
                'classes' => [],
                'href' => 'summary', //admin/teams/id/$id/view/summary
                'hint' => null,
                'badge' => null,
                'badgeClasses' => null,
            ],
            'ru' => [
                'title' => 'Edit',
                'classes' => [],
                'href' => 'ru',
                'hint' => null,
                'badge' => null,
                'badgeClasses' => null,
            ],
            'home' => [
                'title' => 'Home',
                'classes' => [],
                'href' => 'home',
                'hint' => 'Back to front page',
                'badge' => $numUsers . '',
                'badgeClasses' => null,
            ],
            'about' => [
                'title' => 'About',
                'classes' => [],
                'href' => 'about',
                'hint' => null,
                'badge' => '2',
                'badgeClasses' => null,
            ],
            'help' => [
                'title' => 'Help',
                'classes' => [],
                'href' => 'help',
                'hint' => '',
                'badge' => '',
                'badgeClasses' => null,
            ],
        ];
    }
}

