<div class="h-full">
    <div class="col-span-6 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-4 bg-gray-100 flex justify-center items-center">
        @forelse($shoppingLists as $shoppingList)
            <div class="relative h-full p-4 bg-white rounded-xl shadow-xl">
                <div class="mt-4 h-full">
                    <h1 class="text-2xl font-bold text-gray-700">{{ $shoppingList->title }}</h1>
                    <p class="text-sm mt-2 text-gray-700 {{ App\Models\Shopping_lists\ShoppingList::mark_after_expiration($shoppingList) ? 'text-red-500' : '' }}" >
                        {{__('custom.shopping_lists.global.shopping_date')}}: {{ $shoppingList->shopping_date }}</p>
                    <div class="overflow-y-auto h-4/5 mt-3 mb-6 space-x-4 p-1">
                        <ul>
                            @forelse($shoppingList->positions->sortBy('is_done') as $position)
                                <li class="{{ ($position->is_done) ? 'position_is_done' : '' }}">
                                   <div class="inline-flex">
                                       @if(!$position->is_done)
                                           <div class="text-red-500">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                               </svg>
                                           </div>
                                       @else
                                           <div class="text-green-600">
                                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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
                        <a href="{{route('shopping_lists.edit', $shoppingList)}}" class="text-xs md:text-md  block font-semibold py-2 px-6
                            text-white hover:text-green-100 bg-blue-400 rounded-lg
                            shadow hover:shadow-md transition duration-300">{{__('custom.global.edit')}}</a>
                        <a href="{{route('shopping_lists.show', $shoppingList)}}" class="text-xs md:text-md block font-semibold py-2 px-6
                            text-white hover:text-green-100 bg-green-400 rounded-lg
                            shadow hover:shadow-md transition duration-300">{{__('custom.global.choose')}}</a>

                        <form action="{{route('shopping_lists.destroy', $shoppingList)}}" method="post">
                            @CSRF
                            @method('DELETE')
                            <button type="submit" class="text-xs md:text-md block font-semibold py-2 px-6
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
