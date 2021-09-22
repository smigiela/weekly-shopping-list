<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping_lists.show.header') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                    <div class="mt-4">
                        <h1 class="text-2xl font-bold text-gray-700">{{ $shoppingList->title }}</h1>
                        <p class="text-sm mt-2 text-gray-700 {{ App\Models\Shopping_lists\ShoppingList::mark_after_expiration($shoppingList) ? 'text-red-500' : '' }}">
                            {{__('custom.shopping_lists.global.shopping_date')}}: {{ $shoppingList->shopping_date }}</p>
                        <div class="mt-3 space-x-4 p-1">
                            <ul>
                                @forelse($shoppingList->positions->sortBy(['product_category_id', 'is_done']) as $position)
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
                                        <div class="inline-flex ml-6">
                                            <a href="{{route('positions.edit', $position)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="inline-flex">
                                            <form action="{{route('positions.destroy', $position)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </form>
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

    <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    <form action="{{route('positions.store', $shoppingList->id)}}" method="post">
                        @method('POST')
                        @csrf
                        <div class="flex col-span-2 sm:col-span-2">
                            <div class="w-1/2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.add_position')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select name="name" id="name" class="form-select focus:ring-indigo-500 focus:border-indigo-500 flex-1--}}
                                          block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        <option class="font-bold" disabled>{{__('custom.shopping_lists.show.favourites')}}</option>
                                        @if((auth()->user()->favourites)->count() == 0)
                                            <option class="text-red-500" disabled>--{{__('custom.shopping_lists.show.add_fav_in_settings')}}</option>
                                        @endif
                                        @foreach (auth()->user()->favourites as $product)
                                            <option value="{{$product->name}}">
                                                ⭐{{$product->name}}
                                            </option>
                                        @endforeach
                                        @foreach($productCategories as $category)
                                            <option class="font-bold" disabled>{{$category->name}}</option>
                                            @foreach($category->products as $product)
                                                <option value="{{$product->name}}">--{{$product->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ml-2 w-1/4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.amount')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" name="amount" id="amount"
                                           value="{{old('amount')}}"
                                           class="@error('amount') border-red-500 @enderror
                                               focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                </div>
                            </div>
                            <div class="ml-2 w-1/4">
                                <label for="type" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.type')}}
                                </label>
                                <div class="relative inline-block w-full text-gray-700">
                                    <select id="type" name="type" class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border
                                     rounded-lg appearance-none focus:shadow-outline
                                    @error('type') border-red-500 @enderror">
                                        <option disabled
                                                selected>{{__('custom.shopping_lists.show.type_placeholder')}}</option>
                                        <option value="quantity">{{__('custom.shopping_lists.global.qty')}}</option>
                                        <option value="weight">{{__('custom.shopping_lists.global.g')}}</option>
                                        <option value="volume">{{__('custom.shopping_lists.global.ml')}}</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <x-jet-validation-errors></x-jet-validation-errors>

                        <div class="px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{__('custom.global.save')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
