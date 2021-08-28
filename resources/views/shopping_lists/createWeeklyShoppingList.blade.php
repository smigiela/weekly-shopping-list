<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping-lists.show.header') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                    <div class="mt-4">


                        <div class="mt-3 space-x-4 p-1">
                            Stwórz swoją listę tygodniową
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
                    <form action="{{route('weekly_list.store')}}" method="post">
                        @method('POST')
                        @csrf
                        <div class="flex col-span-2 sm:col-span-2">
                            <div class="w-1/4">
                                <label for="amount" class="block text-sm font-medium text-gray-700">
                                    {{__('Nazwa listy')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name"
                                           value="{{old('name')}}"
                                           class="@error('name') border-red-500 @enderror
                                               focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                </div>
                                <label for="date_from" class="block text-sm font-medium text-gray-700">
                                    {{__('Data początkowa')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="date" name="date_from" id="date_from"
                                           value="{{old('date_from')}}"
                                           class="@error('date_from') border-red-500 @enderror
                                               focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                </div>
                                <label for="date_to" class="block text-sm font-medium text-gray-700">
                                    {{__('Data końcowa')}}
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="date" name="date_to" id="date_to"
                                           value="{{old('date_to')}}"
                                           class="@error('date_to') border-red-500 @enderror
                                               focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                               block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                </div>
                            </div>
                            <div class="ml-2 w-1/4">

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
