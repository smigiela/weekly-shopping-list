<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('custom.shopping_lists.index.header') }}
                    </h2>
                </div>
                <div class="ml-6">
                    <a href="{{route('shopping_lists.getArchived')}}"
                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.shopping_lists.index.get_archived')}}
                    </a>
                </div>
            </div>
        </div>
    </x-slot>


    <div class="py-12 grid grid-cols-1 2xl:grid-cols-5 2xl:gap-8">

    <div class="col-span-1">
        <div class="relative h-50 p-4 bg-green-50 rounded-xl shadow-xl">
            <h1 class="text-2xl font-bold text-gray-700">{{ __('custom.shopping_lists.weekly_list.show.header') }}</h1>
            @if(! $weeklyShoppingList)
                <p>{{__('custom.global.nothing_to_show')}}</p>
            @else
                <div class="mt-4 h-96">
                <p class="text-sm mt-2 text-gray-700">
                    {{__('custom.shopping_lists.global.shopping_date')}}
                    : {{ $weeklyShoppingList->shopping_date ?? '' }}</p>
                <div class="overflow-y-auto h-3/5 mt-3 mb-6 space-x-4 p-1">
                    <ul>
                            @forelse($weeklyPositions->sortBy('is_done') as $position)
                                <li class="{{ ($position->is_done) ? 'position_is_done' : '' }}">
                                    <div class="inline-flex">
                                        @if(!$position->is_done)
                                            <div class="text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                        @endif
                                        {{$position->name}} |
                                        {{$position->amount}}
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
                <div class="absolute gap-1 bottom-0 mx-auto mt-4 mb-2 flex justify-between pl-2 pr-1">
                    <a href="{{route('shopping_lists.edit', $weeklyShoppingList ?? '')}}" class="text-xs md:text-md  block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-blue-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.edit')}}</a>
                    <a href="{{route('shopping_lists.show', $weeklyShoppingList ?? '')}}" class="text-xs md:text-md block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-green-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.choose')}}</a>

                    <form action="{{route('shopping_lists.destroy', $weeklyShoppingList ?? '')}}"
                          method="post">
                        @CSRF
                        @method('DELETE')
                        <button type="submit" class="text-xs md:text-md block font-semibold py-2 px-6
                    text-white hover:text-green-100 bg-red-400 rounded-lg
                    shadow hover:shadow-md transition duration-300">{{__('custom.global.archive')}}</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-span-3 flex gap-4 overflow-hidden sm:rounded-lg">
        <div class="w-full">
                <div class="">
                    @livewire('show-lists')
                </div>
        </div>
    </div>
    <!-- forms -->
    <div class="col-span-1">
        <form action="{{route('shopping_lists.store')}}" method="POST">
            @method('POST')
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <h1>{{__('custom.shopping_lists.create.header')}} <b>{{auth()->user()->currentTeam->name}}</b>
                    </h1>
                    <div class="">
                        <div class="">
                            <x-jet-label for="title" class="block text-sm font-medium text-gray-700">
                                {{__('custom.shopping_lists.create.title')}}
                            </x-jet-label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <x-jet-input type="text" name="title" id="title"
                                             class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </x-jet-input>
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-jet-label for="shopping_date" class="block text-sm font-medium text-gray-700">
                            {{__('custom.shopping_lists.global.shopping_date')}}
                        </x-jet-label>
                        <x-jet-input type="date" id="shopping_date" name="shopping_date"
                                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                     placeholder="you@example.com">
                        </x-jet-input>
                    </div>
                    <x-jet-validation-errors></x-jet-validation-errors>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.global.save')}}
                    </button>
                </div>
            </div>
        </form>
        <form action="{{route('weekly_lists.store')}}" method="post" class="mt-4">
            @method('POST')
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <h1>{{__('custom.shopping_lists.weekly_list.create.header')}}
                    </h1>
                    <div class="">
                        <x-jet-label for="date_from" class="block text-sm font-medium text-gray-700">
                            {{__('custom.shopping_lists.weekly_list.create.start_date')}}
                        </x-jet-label>
                        <x-jet-input type="date" name="date_from" id="date_from"
                                     value="{{old('date_from')}}"
                                     class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                   block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </x-jet-input>

                        <x-jet-label for="date_to" class="block text-sm font-medium text-gray-700 mt-6">
                            {{__('custom.shopping_lists.weekly_list.create.end_date')}}
                        </x-jet-label>
                        <x-jet-input type="date" name="date_to" id="date_to"
                                     value="{{old('date_to')}}"
                                     class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                   block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </x-jet-input>
                    </div>
                </div>


                <x-jet-validation-errors></x-jet-validation-errors>

                <div class="py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.global.save')}}
                    </button>
                </div>
            </div>
        </form>

    </div>


</x-app-layout>

