<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping_lists.weekly_list.show.header') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    <p class="text-sm mt-2 text-gray-700">
                        {{__('custom.shopping_lists.global.shopping_date')}}: {{ $weeklyShoppingList->shopping_date ?? ''}}
                    </p>
                    <div class="mt-3 space-x-4 p-1">
                        <ul>
                        @forelse($weeklyPositions->sortBy('is_done') as $position)
                            <li class="{{ ($position->is_done) ? 'position_is_done' : '' }}">
                                <div class="inline-flex">
                                    @if(!$position->is_done)
                                        <a href="{{route('positions.markAsDone', $position)}}" class="inline-block">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                                </path>
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{route('positions.unmarkAsDone', $position)}}" class="inline-block">
                                            <svg class="w-6 h-6" fill="none" stroke="green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    {{$position->name}} |
                                    {{$position->sum}}
                                    @if($position->type == 'weight'){{__('custom.shopping_lists.global.g')}}
                                    @elseif($position->type == 'quantity'){{__('custom.shopping_lists.global.qty')}}
                                    @elseif($position->type == 'volume'){{__('custom.shopping_lists.global.ml')}}
                                    @endif
                                </div>
                                </li>
                                <hr>
                            @empty
                                {{__('custom.global.nothing_to_show')}}
                            @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
