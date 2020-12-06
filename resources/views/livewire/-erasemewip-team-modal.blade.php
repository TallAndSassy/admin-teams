<div >
    <livewire:flash-container key="{{uniqid()}}"/>

            @if ($isInState == 'reading')
                <div class="">
                    <x-tassy::ui.looks.label-value label="Name">
                        <x-slot name="value">
                            {!! $knownGoodName !!}
                        </x-slot>
                    </x-tassy::ui.looks.label-value>
                </div>
                <div class="text-right pr-3">
                    <x-tassy::ui.looks.link-to wire:click.prevent="moveToState('editing')" href='/'>
                        Edit
                    </x-tassy::ui.looks.link-to>
                </div>
            @elseif ($isInState == 'editing')
                <x-tassy::ui.looks.link-to href="/" wire:click.prevent="moveToState('reading')" enum-sandbox="back">
                    Back
                </x-tassy::ui.looks.link-to>
                <div class="sm:border-t sm:border-gray-200">
                   <div class="sm:grid sm:grid-cols-3 sm:gap-3 sm:items-start  sm:pt-3">
                      <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Name
                      </label>
                      <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg rounded-md shadow-sm sm:max-w-xs">
                          <input id="name" type="text" wire:model="someModel.name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                      </div>

                       @error('someModel.name') <div class="spacer"></div> <x-tassy::ui.looks.input-error class=" sm:col-span-2  sm:max-w-xs">{{ $message }}</x-tassy::ui.looks.input-error> @enderror

                    </div>

                </div>

            @else
                {{assert(0,__FILE__.__LINE__)}}
    @endif
    <div class="buttonRow  px-4 py-3 sm:px-0 sm:flex  sm:flex-row-reverse">
        @if ($isInState == 'reading')
            @component('components.buttons.standard_bottom',['type'=>'Primary'])
                @slot('text')
                    Close
                @endslot
                @slot('click')
                    close()
                @endslot
            @endcomponent
        @elseif ($isInState == 'editing')
            <div class="ml-2">
            @component('components.buttons.standard_bottom',['type'=>'Primary'])
                @slot('text')
                    {{-- I'd put this wire stuff into slots... not important enough yet--}}
                     <div wire:click="update()" wire:loading.attr="disabled"
                                class="{{ $canUpdate ?'' : 'text-blue-200'}}">
                        Update
                    </div>
                @endslot
                @slot('click')
                @endslot
            @endcomponent
        </div>
            <div class="">
             @component('components.buttons.standard_bottom',['type'=>'Secondary'])
                @slot('text')
                    Cancel
                @endslot
{{--                It would be better to have this go back to first page rather than close--}}
{{--                 If would be nice, maybe to make Close and Cancel shortcut buttons. Seems super common.--}}

            @endcomponent
            </div>
        @else
            {{assert(0,__FILE__.__LINE__)}}
        @endif
    </div>

</div>
