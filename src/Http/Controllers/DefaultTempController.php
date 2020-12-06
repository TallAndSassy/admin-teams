<?php

namespace TallModSassy\AdminTeams\Http\Controllers;

class DefaultTempController extends \App\Http\Controllers\Controller
{
    public function render() {
        return 'String returned from '.__METHOD__;
    }

    public function render2() {
        return 'String returned from '.__METHOD__;
    }

     public function renderFronts() {
        return 'String returned from '.__METHOD__;
    }

     public function renderBody() {
        return 'String returned from '.__METHOD__;
    }


}
