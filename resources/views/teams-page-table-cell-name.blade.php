<div>
{{--    @livewire('tassy::team-true',['id'=>$id],key($id))--}}
      {!!
        \App\Http\Livewire\TheModalBox::generateLinkToRaiseModal(
        $asrRow['name'],
        "admin/teams/id/$id/view/tabs",
        "Team: {$asrRow['name']}",
        'None', 'Ignored')
    !!}
</div>
