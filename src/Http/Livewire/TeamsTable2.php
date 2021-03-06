<?php

namespace TallModSassy\AdminTeams\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\DateColumn;
use \Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\CustomColumn;

class TeamsTable2 extends LivewireDatatable
{
    public $model = \App\Models\User::class;

    public function columns()
    {
        $me = $this;
        return [
            //            Column::name('name')
            //                ->label('Person')
            //                ->searchable()
            //            ,
            Column::Callback(['name','email', 'id'],
                function(string $value, string $email, int $id) use ($me): string {
                    #return "<div>$value</div>";
                    $maybeHighlightedValue = $me->highlightStringWithCurrentSearchTerm($value);
                    #return $maybeHighlightedValue;
                    $maybeHighlightedValue = $value;
                    $asrRow = [];
                    $asrRow['id'] = $id;
                    $asrRow['name'] = $value;
                    $asrRow['email'] = $email;
                    #$asrRow['email_verified_at'] =$email_verified_at;
                    #Column not found: 1054 Unknown column 'users.profile_photo_url' $asrRow['profile_photo_url'] = $profile_photo_url;
                    $asrRow['profile_photo_url'] = null;
                    return view('tassy::users-page-table-cell-name', ['value'=>$value, 'maybeHighlightedValue'=>$maybeHighlightedValue,  'id'=>$id, 'asrRow'=>$asrRow])->render();
                })
                ->label('Modal Person')
                ->searchable()
            ,
            Column::Callback(
                'email',
                function (string $value) use ($me): string {
                    $maybeHighlightedValue = $me->highlightStringWithCurrentSearchTerm($value);
                    #return "<a href='mailto:$value'>$maybeHighlightedValue</a>";
                    return view('tassy::components.ui.link_mailto',['slotWithHighlighting'=>$value,'slot'=>$maybeHighlightedValue]);
                })
                ->label('Email')
                ->searchable()
            ,
            Column::Callback(__('id'),
                function(int $id) {
                    $objUser = \App\Models\User::find($id);
                    return view('tassy::users-page-table-cell-teams',['objUser'=>$objUser]);
                })
                ->label(__('Teams')),

            DateColumn::raw('created_at')
                ->label('Created On')
                ->format('jS F, Y')
                ->hide()
                ->searchable(),

        ];
    }
}
