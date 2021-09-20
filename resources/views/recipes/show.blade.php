<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.recipes.show.header') . $recipe->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                    <div class="mt-4">
                        <div class="mt-3 space-x-4 p-1">
                            <div><img src="https://images.unsplash.com/photo-1586227740560-8cf2732c1531?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2028&q=80" alt=""></div>
                            <div>{{ $recipe->description }}</div>
                            <hr>
                            <h1 class="font-bold">{{__('custom.recipes.show.list')}}</h1>
                            <ul>
                                @forelse($recipe->recipeItems as $recipeItem)
                                    <li>
                                        {{ $recipeItem->name }} | {{ $recipeItem->amount }} |
                                        @if($recipeItem->amount_type == 'weight'){{__('custom.shopping_lists.global.g')}}
                                        @elseif($recipeItem->amount_type == 'quantity'){{__('custom.shopping_lists.global.qty')}}
                                        @elseif($recipeItem->amount_type == 'volume'){{__('custom.shopping_lists.global.ml')}}
                                        @endif
                                    </li>
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
                    <form action="{{route('recipe_items.store', $recipe->id)}}" method="post">
                        @method('POST')
                        @csrf
                        <div class="flex col-span-2 sm:col-span-2">
                            <div class="w-1/2">
                                <x-jet-label for="name" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.add_position')}}
                                </x-jet-label>
                                <select name="name" id="name" class="form-select focus:ring-indigo-500 focus:border-indigo-500 flex-1--}}
                                          block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                   @foreach($products as $product)
                                        <option value="{{$product->name}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-2 w-1/4">
                                <x-jet-label for="amount" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.amount')}}
                                </x-jet-label>
                                <x-jet-input type="number" name="amount" id="amount"
                                       value="old('amount')"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                           block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </x-jet-input>
                            </div>
                            <div class="ml-2 w-1/4">
                                <x-jet-label for="amount_type" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.type')}}
                                </x-jet-label>
                                <select id="amount_type" name="amount_type" class="form-select focus:ring-indigo-500 focus:border-indigo-500 flex-1--}}
                                      block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    <option disabled
                                            selected>{{__('custom.shopping_lists.show.type_placeholder')}}</option>
                                    <option value="quantity">{{__('custom.shopping_lists.global.qty')}}</option>
                                    <option value="weight">{{__('custom.shopping_lists.global.g')}}</option>
                                    <option value="volume">{{__('custom.shopping_lists.global.ml')}}</option>
                                </select>
                            </div>
                        </div>
                        <p>{{__('custom.recipes.show.no_product_on_list')}} <a href="">{{__('custom.global.there')}}</a></p>
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
