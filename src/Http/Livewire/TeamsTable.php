<?php

namespace TallModSassy\AdminTeams\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use ElegantTechnologies\LaravelLivewireTables\Views\Column;



class TeamsTable extends \TallAndSassy\AppThemBaseTables\ThemedTable
{
    public function query() : Builder
    {

        $qb = \App\Models\Team::where('id','>',0); //  Illuminate\Database\Eloquent\Builder
        return $qb;
    }

    public static function getAsrReadables($row) : array {
        // Hmm - this should be more automatic
        #dd($row);
        $asrRow = [];
        $asrRow['id'] = $row['id'];
        $asrRow['name'] = $row['name'];
        $asrRow['email'] = $row['email'];
        $asrRow['email_verified_at'] = $row['email_verified_at'];
        $asrRow['profile_photo_url'] = $row['profile_photo_url'];
        return $asrRow;
    }

    public function columns() : array
    {

        return [
            // Todo: Show how to do a row count
            //            Column::make('#','myCount')
            //                ->isCustomAttribute(),
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Name')
                ->searchable()
                ->sortable()
                ->html()
                ->render(function($row) {
                    $asrRow = static::getAsrReadables($row);
                    $maybeHighlightedValue = $value = $asrRow['name'];
                    $id = $row['id'];


                    return view('tassy::teams-page-table-cell-name', ['value'=>$value, 'maybeHighlightedValue'=>$maybeHighlightedValue,  'id'=>$id, 'asrRow'=>$asrRow])->render();
                    #return "<b>{$row['name']}</b>";
                }),

             Column::make('Actions')
                ->html()
                ->render(function($row) {
                    $asrRow = static::getAsrReadables($row);
                    $id = $row['id'];
                    return view('tassy::teams-page-table-cell-actions', [ 'id'=>$id, 'asrRow'=>$asrRow])->render();
                }),

        ];
    }

    public function setTableDataClass($attribute, $value) : ?string {
        $extraClasses = parent::setTableDataClass($attribute, $value);
        if ($attribute == 'id') {               // This says, if I'm in the body on the column named 'id'
            $extraClasses .= ' text-center ';   // then add this html 'class' attribute to each td,
                                                //  like <td class='text-center'
        }
        return $extraClasses;
    }
}
