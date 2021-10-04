<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.positions.edit.header') }}
        </h2>
    </x-slot>

    <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    <form action="{{route('positions.update', $position)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="flex col-span-2 sm:col-span-2">
                            <div class="w-1/2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.positions.edit.product')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" disabled
                                           value="{{$position->name}}"
                                           class="@error('name') border-red-500 @enderror
                                               disabled:opacity-25 focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                </div>
                            </div>
                            <div class="ml-2 w-1/4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.amount')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" name="amount" id="amount"
                                           value="{{old('amount', $position->amount)}}"
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
                                        <option {{ ($position->type == 'quantity' ? 'selected' : '')}}
                                                value="quantity">{{__('custom.shopping_lists.global.qty')}}</option>
                                        <option {{ ($position->type == 'weight' ? 'selected' : '')}}
                                                value="weight">{{__('custom.shopping_lists.global.g')}}</option>
                                        <option {{ ($position->type == 'volume' ? 'selected' : '')}}
                                                value="volume">{{__('custom.shopping_lists.global.ml')}}</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                    </div>
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
</x-app-layout>
