<?php

namespace TallModSassy\AdminTeams\Models;

class TassyTeam extends \App\Models\Team
{
    public $table = 'Teams';

    public function members() {
        return $this->hasManyThrough(\App\Models\User::class,TeamsUsers::class,'id','id');
    }
}
