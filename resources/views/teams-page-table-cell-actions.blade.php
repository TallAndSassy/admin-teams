<div>
    {!!
        \App\Http\Livewire\TheModalBox::generateLinkToRaiseModal(
        'Edit',
        "admin/teams/team/$id/view/ru",
        "Team: {$asrRow['name']}",
        'None', 'Ignored')
    !!}

    {!!
        \App\Http\Livewire\TheModalBox::generateLinkToRaiseModal(
        'Summary',
        "admin/teams/team/$id/view/summary",
        "Team: {$asrRow['name']}",
        'None', 'Ignored')
    !!}
</div>
