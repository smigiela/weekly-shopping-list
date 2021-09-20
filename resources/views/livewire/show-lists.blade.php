<div>
    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 2xl:grid-cols-4 gap-4 bg-gray-100 flex justify-center items-center">
        @forelse($shoppingLists as $shoppingList)
            <div class="p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                <div class="mt-4">
                    <h1 class="text-2xl font-bold text-gray-700">{{ $shoppingList->title }}</h1>
                    <p class="text-sm mt-2 text-gray-700 {{ App\Models\Shopping_lists\ShoppingList::mark_after_expiration($shoppingList) ? 'text-red-500' : '' }}" >
                        {{__('custom.shopping_lists.global.shopping_date')}}: {{ $shoppingList->shopping_date }}</p>
                    <div class="mt-3 space-x-4 p-1">
                        <ul>
                            @forelse($shoppingList->positions->sortBy('is_done') as $position)
                                <li class="{{ ($position->is_done) ? 'position_is_done' : '' }}">
                                   <div class="inline-flex">
                                       @if(!$position->is_done)
                                           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                               </path>
                                           </svg>
                                       @else
                                           <svg class="w-6 h-6" fill="none" stroke="green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                               </path>
                                           </svg>
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
                    <div class="mt-4 mb-2 flex justify-between pl-2 pr-1">
                        <a href="{{route('shopping_lists.edit', $shoppingList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-blue-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.edit')}}</a>
                        <a href="{{route('shopping_lists.show', $shoppingList)}}" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-green-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.choose')}}</a>

                        <form action="{{route('shopping_lists.destroy', $shoppingList)}}" method="post">
                            @CSRF
                            @method('DELETE')
                            <button type="submit" class="text-lg block font-semibold py-2 px-6
                        text-white hover:text-green-100 bg-red-400 rounded-lg
                        shadow hover:shadow-md transition duration-300">{{__('custom.global.archive')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            {{__('custom.global.nothing_to_show')}}
        @endforelse
    </div>
    <div class="p-2">{{ $shoppingLists->links() }}</div>
</div>
