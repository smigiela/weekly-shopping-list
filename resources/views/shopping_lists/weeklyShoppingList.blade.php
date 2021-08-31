<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.shopping-lists.weekly_list.header') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                    <h1>{{ __('custom.shopping-lists.weekly_list.subheader') }}</h1>
                    <form action="{{route('weekly_list.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <input type="date" name="startDate" id="startDate">
                        <input type="date" name="endDate" id="endDate">
                        <button type="submit" class="mt-6 text-lg block font-semibold py-2 px-6
                                    text-white hover:text-green-100 bg-green-400 rounded-lg
                                    shadow hover:shadow-md transition duration-300">{{ __('custom.shopping-lists.weekly_list.button') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div>




</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    <p class="text-sm mt-2 text-gray-700">
                        {{__('custom.shopping-lists.global.shopping_date')}}
                    </p>
                    <div class="mt-3 space-x-4 p-1">
                        <ul>
                        @foreach($weeklyList as $position)
                            <li>
                                {{$position->name}}
                                {{$position->sum}}
                                @if(!$position->is_done)
                                    <a href="{{route('positions.markAsDone', $position)}}" class="inline-block">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                            </path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{route('positions.unmarkAsDone', $position)}}" class="inline-block">
                                        <svg class="w-6 h-6" fill="none" stroke="green" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">

                                            </path>
                                        </svg>
                                    </a>
                                @endif


                                </li>

                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
