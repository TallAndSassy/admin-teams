<div >
    <livewire:flash-container key="{{uniqid()}}"/>

    <div>
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        @include('tassy::admin.dashboard.top-stats-label')
    </h3>
    @php
        $arrCards_asViews = [];
        $arrCards_asViews[] = view('tassy::admin.cards.simple-stat',['title'=>'Num Family Members', 'value'=>$numMembers]);
        #$arrCards_asViews[] = view('tassy::admin.cards.simple-stat',['title'=>'Balance', 'value'=>$accountBalanceCents]);
    @endphp
    @if(count($arrCards_asViews) == 0)
        <div class="text-gray-400">N/A</div>
        @if (App::environment(['local']))
        <!-- Try adding \TallAndSassy\AppThemeBaseAdmin\Http\Controllers\Admin\DashboardController::singleton('TopStats')->push(\TallModSassy\AdminUsers\Http\Livewire\Cards\NumUsers::class); to /app/Providers/AppServiceProvider/book -->
        @endif

    @else
        <div class="mt-1 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow md:grid-cols-{{count($arrCards_asViews)}}">
            @foreach ($arrCards_asViews as $slot=>$cardView)
                @if ($slot == 0) {{--  First--}}
                <div class="px-4  ">
                @elseif ($slot == (count($arrCards_asViews) - 1)) {{--  Last--}}
                <div class="border-t border-gray-200 md:border-0 md:border-l">
                @else {{--  Middles --}}
                <div class="border-t border-gray-200 md:border-0 md:border-l">
                @endif
                    <div>
                        {!! $cardView !!}
                    </div>
                </div>

            @endforeach
        </div>
    @endif
</div>



{{--    <div class="beTopStats flex">--}}
{{--    <!-- Account Balance -->--}}
{{--<div class="bg-white overflow-hidden shadow rounded-lg">--}}
{{--              <div class="p-5">--}}
{{--                <div class="flex items-center">--}}
{{--                  <div class="flex-shrink-0">--}}
{{--                    <!-- Heroicon name: scale -->--}}
{{--                    <svg class="h-6 w-6 text-cool-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />--}}
{{--                    </svg>--}}
{{--                  </div>--}}
{{--                  <div class="ml-5 w-0 flex-1">--}}
{{--                    <dl>--}}
{{--                      <dt class="text-sm leading-5 font-medium text-cool-gray-500 truncate">--}}
{{--                        Account balance--}}
{{--                      </dt>--}}
{{--                      <dd>--}}
{{--                        <div class="text-lg leading-7 font-medium text-cool-gray-900">--}}
{{--                            {!! $accountBalanceCents !!}--}}
{{--                        </div>--}}
{{--                      </dd>--}}
{{--                    </dl>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="bg-cool-gray-50 px-5 py-3">--}}
{{--                <div class="text-sm leading-5">--}}
{{--                  <a href="#" class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">--}}
{{--                    View all--}}
{{--                  </a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--    <!-- Num Members -->--}}
{{--    <div class="bg-white overflow-hidden shadow rounded-lg">--}}
{{--              <div class="p-5">--}}
{{--                <div class="flex items-center">--}}
{{--                  <div class="flex-shrink-0">--}}
{{--                    <!-- Heroicon name: scale -->--}}
{{--                    <svg class="h-6 w-6 text-cool-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />--}}
{{--                    </svg>--}}
{{--                  </div>--}}
{{--                  <div class="ml-5 w-0 flex-1">--}}
{{--                    <dl>--}}
{{--                      <dt class="text-sm leading-5 font-medium text-cool-gray-500 truncate">--}}
{{--                        Num People--}}
{{--                      </dt>--}}
{{--                      <dd>--}}
{{--                        <div class="text-lg leading-7 font-medium text-cool-gray-900">--}}
{{--                            {!! $numMembers !!}--}}
{{--                        </div>--}}
{{--                      </dd>--}}
{{--                    </dl>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="bg-cool-gray-50 px-5 py-3">--}}
{{--                <div class="text-sm leading-5">--}}
{{--                  <a href="#" class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">--}}
{{--                    Other 1--}}
{{--                  </a>--}}
{{--                </div>--}}
{{--                <div class="text-sm leading-5">--}}
{{--                  <a href="#" class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">--}}
{{--                    Other 2--}}
{{--                  </a>--}}
{{--                </div>--}}
{{--                <div class="text-sm leading-5">--}}
{{--                  <a href="#" class="font-medium text-teal-600 hover:text-teal-900 transition ease-in-out duration-150">--}}
{{--                    Other 3--}}
{{--                  </a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--</div>--}}
    <div class="buttonRow  px-4 py-3 sm:px-0 sm:flex  sm:flex-row-reverse">
        @component('components.buttons.standard_bottom',['type'=>'Primary'])
            @slot('text')
                Close
            @endslot
            @slot('click')
                close()
            @endslot
        @endcomponent
    </div>

</div>
