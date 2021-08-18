<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 2xl:grid-cols-6 gap-4 bg-gray-100 flex justify-center items-center">
        @forelse($shoppingLists as $shoppingList)
            <div class="p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                <div class="mt-4">
                    <h1 class="text-2xl font-bold text-gray-700">{{ $shoppingList->title }}</h1>
                    <p class="text-sm mt-2 text-gray-700 {{ App\Models\ShoppingList::mark_after_expiration($shoppingList) ? 'text-red-500' : '' }}" >
                        {{__('custom.shopping-lists.global.shopping_date')}}: {{ $shoppingList->shopping_date }}</p>
                    <div class="mt-3 space-x-4 p-1">
                        <ul>
                            @forelse($shoppingList->positions as $position)
                                <div class="flex">
                                    <div class="w-1/2">
                                        <li>{{$position->name}}</li>
                                    </div>
                                    <div class="w-1/4">
                                        <li>{{$position->quantity}} sztuk</li>
                                    </div>
                                    <div class="w-1/4">
                                        <li>{{$position->weight}} g</li>
                                    </div>
                                </div>
                                <hr>
                            @empty
                                {{__('custom.global.nothing_to_show')}}
                            @endforelse
                        </ul>
                    </div>
                    <div class="mt-4 mb-2 flex justify-between pl-2 pr-1">
                        <a href="{{route('shopping_lists.edit', $shoppingList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-blue-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.edit')}}</a>
                        <a href="{{route('shopping_lists.show', $shoppingList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-green-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.choose')}}</a>
                    </div>
                </div>
            </div>
        @empty
            {{__('custom.global.nothing_to_show')}}
        @endforelse
    </div>
    <div class="p-2">{{ $shoppingLists->links() }}</div>
</div>
