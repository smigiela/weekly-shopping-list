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
                            <div>
                                @if($recipe->getFirstMedia('recipe_cover'))
                                    <img class="w-1/2 h-1/2"
                                         src="{{$recipe->getFirstMediaUrl('recipe_cover')}}"
                                         alt="" loading="lazy"/>
                                @else
                                    <img class="w-1/2 h-1/2"
                                         src="https://via.placeholder.com/150"
                                         alt="" loading="lazy"/>
                                @endif
                            </div>
                            <div class="mt-6 px-8 py-6">{!! $recipe->description !!}</div>
                            <hr>
                            <h1 class="font-bold">{{__('custom.recipes.show.list')}}</h1>
                            <ul>
                                @forelse($recipe->recipeItems as $recipeItem)
                                    <li>
                                        - {{ $recipeItem->name }} | {{ $recipeItem->amount }}
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
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    @endsection
    @section('scripts')
        @include('partials.select2')
    @endsection
</x-app-layout>
