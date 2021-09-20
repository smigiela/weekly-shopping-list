<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('custom.shopping_lists.index.header') }}
                    </h2>
                </div>
                <div class="ml-6">
                    <a href="{{route('shopping_lists.getArchived')}}"
                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.shopping_lists.index.get_archived')}}
                    </a>
                </div>
            </div>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 overflow-hidden sm:rounded-lg">
                <div class="w-full">
                    @livewire('show-lists')
                </div>
            </div>
        </div>
    </div>
    <div class="m-5">

        <form action="{{route('shopping_lists.store')}}" method="POST">
            @method('POST')
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <h1>{{__('custom.shopping_lists.create.header')}} <b>{{auth()->user()->currentTeam->name}}</b></h1>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2 sm:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                {{__('custom.shopping_lists.create.title')}}
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="title" id="title"
                                       class="@error('title') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="shopping_date" class="block text-sm font-medium text-gray-700">
                            {{__('custom.shopping_lists.global.shopping_date')}}
                        </label>
                        <div class="mt-1">
                            <input type="date" id="shopping_date" name="shopping_date"
                                   class="@error('shopping_date') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com">
                        </div>
                    </div>
                    <x-jet-validation-errors></x-jet-validation-errors>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.global.save')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
