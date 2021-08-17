<div>
    <div class="grid grid-cols-2 md:grid-cols-6 gap-4 bg-gray-100 flex justify-center items-center">
        @forelse($shoppingLists as $shoppingList)
            <div class="p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                <div class="mt-4">
                    <h1 class="text-2xl font-bold text-gray-700">{{ $shoppingList->title }}</h1>
                    <p class="text-sm mt-2 text-gray-700 {{ $this->check_date($shoppingList) ? 'text-red-500' : '' }}" >
                        {{__('custom.shopping-lists.global.shopping_date')}}: {{ $shoppingList->shopping_date }}</p>
                    <div class="mt-3 space-x-4 flex p-1">
                        <ul>
                            <li>sadjaskd</li>
                            <li>sadjaskd</li>
                            <li>sadjaskd</li>
                            <li>sadjaskd</li>
                        </ul>
                    </div>
                    <div class="mt-4 mb-2 flex justify-between pl-2 pr-1">
                        <button class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-green-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.choose')}}</button>
                    </div>
                </div>
            </div>
        @empty
            {{__('custom.global.nothing_to_show')}}
        @endforelse
    </div>
    <div class="p-2">{{ $shoppingLists->links() }}</div>
</div>
