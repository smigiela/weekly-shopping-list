<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.products.create.header') }}
        </h2>
    </x-slot>

    <div class="py-12 center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:px-6 lg:px-8">
                <div class="flex gap-4 overflow-hidden sm:rounded-lg">
                    <div class="sm:w-3/4 md:w-3/4 lg:w-3/4 2xl:w-3/4 w-full bg-white">
                        <div class="mt-4 px-8 py-6">
                            <h2 class="text-2xl">{{__('custom.recipes.edit.add_ingredient')}}</h2>
                            <form action="{{route('products.store')}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="grid grid-cols-2 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <x-jet-label for="name" class="block text-sm font-medium text-gray-700">
                                            {{__('custom.products.create.name')}}
                                        </x-jet-label>
                                        <x-jet-input type="text" name="name" id="name" :value="old('name')"
                                                     class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 mb-6">
                                        </x-jet-input>

                                        <x-jet-label
                                            for="product_category_id">{{__('custom.products.create.category')}}</x-jet-label>
                                        <select name="product_category_id" id="product_category_id"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 mb-6">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
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
        </div>
    </div>
</x-app-layout>
