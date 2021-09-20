<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping_lists.archived_lists.index.header') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 2xl:grid-cols-4 gap-4 bg-gray-100 flex justify-center items-center">
                        @forelse($archivedLists as $archivedList)
                            <div class="p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                                <div class="mt-4">
                                    <h1 class="text-2xl font-bold text-gray-700">{{ $archivedList->title }}</h1>
                                    <p class="text-sm mt-2 text-gray-700 {{ App\Models\Shopping_lists\ShoppingList::mark_after_expiration($archivedList) ? 'text-red-500' : '' }}" >
                                        {{__('custom.shopping_lists.global.shopping_date')}}: {{ $archivedList->shopping_date }}</p>
                                    <div class="mt-3 space-x-4 p-1">
                                        <ul>
                                            @forelse($archivedList->positions->sortBy('is_done') as $position)
                                                <li class="{{ ($position->is_done) ? 'position_is_done' : '' }}">
                                                    <div class="inline-flex">
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
                                    <div class="mt-4 mb-2 flex justify-between pl-2 pr-1">
                                        <a href="{{route('shopping_lists.editArchivedList', $archivedList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-blue-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.shopping_lists.archived_lists.index.restore')}}</a>
                                        <a href="{{route('shopping_lists.show', $archivedList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-red-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.permanently_delete')}}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            {{__('custom.global.nothing_to_show')}}
                        @endforelse
                    </div>
                    <div class="p-2">{{ $archivedLists->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
