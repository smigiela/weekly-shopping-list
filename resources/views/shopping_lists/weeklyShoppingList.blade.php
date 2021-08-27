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


    @foreach($weeklyList->positionsByShoppingLists->groupBy('name') as $key => $value)
        {{ $key}} ->
            @foreach($value as $v)
                {{$v->sum('amount')}}
                {{$v->type}}
            @endforeach
        <br>
    @endforeach
        {{dd($weeklyList)}}

</div>


{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">--}}
{{--                    <div class="mt-4">--}}
{{--                        <h1 class="text-2xl font-bold text-gray-700">{{ $w->title ?? ''}}</h1>--}}
{{--                        <p class="text-sm mt-2 text-gray-700">--}}
{{--                            {{__('custom.shopping-lists.global.shopping_date')}}--}}
{{--                            : {{ $w->shopping_date  ?? ''}}</p>--}}
{{--                        <div class="mt-3 space-x-4 p-1">--}}
{{--                            <ul>--}}
{{--                                @foreach($positions as $name => $position)--}}
{{--                                    @forelse($position as $pos)--}}
{{--                                        <div class="flex">--}}
{{--                                            @if(!$pos->is_done)--}}
{{--                                                <a href="{{route('positions.markAsDone', $pos)}}" class="inline-block">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"--}}
{{--                                                         viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                        <path fill-rule="evenodd"--}}
{{--                                                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"--}}
{{--                                                              clip-rule="evenodd"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{route('positions.unmarkAsDone', $pos)}}"--}}
{{--                                                   class="inline-block">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"--}}
{{--                                                         viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                        <path fill-rule="evenodd"--}}
{{--                                                              d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"--}}
{{--                                                              clip-rule="evenodd"/>--}}
{{--                                                    </svg>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                            <div class="w-1/2">--}}
{{--                                                <li class="{{ ($pos->is_done) ? 'position_is_done' : '' }}">--}}

{{--                                                    {{$pos->name}}--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-1/4">--}}
{{--                                                <li class="{{ ($pos->is_done) ? 'position_is_done' : '' }}">{{$pos->amount}}--}}
{{--                                                    @if($pos->type == 'weight'){{__('custom.shopping-lists.show.g')}}--}}
{{--                                                    @elseif($pos->type == 'quantity'){{__('custom.shopping-lists.show.qty')}}--}}
{{--                                                    @elseif($pos->type == 'volume'){{__('custom.shopping-lists.show.ml')}}--}}
{{--                                                    @endif</li>--}}
{{--                                            </div>--}}
{{--                                            <div class="w-1/4 text-right">--}}
{{--                                                <li>--}}
{{--                                                    <div class="grid grid-cols-3">--}}
{{--                                                        <div>--}}
{{--                                                            <a href="{{route('positions.edit', $pos)}}">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"--}}
{{--                                                                     viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                                    <path--}}
{{--                                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>--}}
{{--                                                                </svg>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                        <div>--}}
{{--                                                            <form action="{{route('positions.destroy', $pos)}}"--}}
{{--                                                                  method="post">--}}
{{--                                                                @method('DELETE')--}}
{{--                                                                @csrf--}}
{{--                                                                <button type="submit">--}}
{{--                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"--}}
{{--                                                                         viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                                        <path fill-rule="evenodd"--}}
{{--                                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"--}}
{{--                                                                              clip-rule="evenodd"/>--}}
{{--                                                                    </svg>--}}
{{--                                                                </button>--}}
{{--                                                            </form>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                    @empty--}}
{{--                                        {{__('custom.global.nothing_to_show')}}--}}
{{--                                    @endforelse--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
