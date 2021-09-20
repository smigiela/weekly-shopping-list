<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping_lists.restore.header') }}
        </h2>
    </x-slot>

    <div class="py-12 center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:px-6 lg:px-8">
                    <div class="flex gap-4 overflow-hidden sm:rounded-lg">
                        <div class="sm:w-3/4 md:w-3/4 lg:w-3/4 2xl:w-3/4 w-full bg-white">
                            <form action="{{route('shopping_lists.restore', $shoppingList)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
{{--                                        <div class="grid grid-cols-2 gap-6">--}}
{{--                                            <div class="col-span-2 sm:col-span-2">--}}
{{--                                                <label for="title" class="block text-sm font-medium text-gray-700">--}}
{{--                                                    {{__('custom.shopping_lists.create.title')}}--}}
{{--                                                </label>--}}
{{--                                                <div class="mt-1 flex rounded-md shadow-sm">--}}
{{--                                                    <input type="text" name="title" id="title"--}}
{{--                                                           value="{{$shoppingList->title}}"--}}
{{--                                                           class="@error('title') border-red-500 @enderror--}}
{{--                                                               focus:ring-indigo-500 focus:border-indigo-500 flex-1--}}
{{--                                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div>
                                            <label for="shopping_date" class="block text-sm font-medium text-gray-700">
                                                {{__('custom.shopping_lists.create.shopping_date')}}
                                            </label>
                                            <div class="mt-1">
                                                <input type="date" id="shopping_date" name="shopping_date"
                                                       value="{{old('shopping_date')}}"
                                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                       placeholder="you@example.com">
                                            </div>
                                        </div>
                                        <x-jet-validation-errors></x-jet-validation-errors>
                                    </div>
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            {{__('custom.global.save')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
