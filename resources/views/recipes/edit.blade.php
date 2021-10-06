<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('custom.recipes.edit.header') . $recipe->name }}
                    </h2>
                </div>
                <div class="ml-6">
                    <a href="{{route('recipe.shareToPublic', $recipe)}}"
                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.recipes.edit.share_to_public')}}
                    </a>
                </div>
                <div class="ml-6">
                    <a href="{{route('recipe.shareToTeam', $recipe)}}"
                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('custom.recipes.edit.share_to_team')}}
                    </a>
                </div>
            </div>
        </div>


        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="flex gap-4 overflow-hidden sm:rounded-lg">
                    <div class="w-full">
                        <h1 class="text-2xl">{{__('custom.recipes.edit.edit_form')}}</h1>

                        <form action="{{route('recipes.store')}}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-2 sm:col-span-2">
                                            <x-jet-label for="name" class="block text-sm font-medium text-gray-700">
                                                {{__('custom.recipes.create.name')}}
                                            </x-jet-label>
                                            <x-jet-input type="text" name="name" id="name" value="{{$recipe->name}}"
                                                         class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 mb-6">
                                            </x-jet-input>
                                            <x-jet-label for="description">{{__('custom.recipes.create.description')}}</x-jet-label>
                                            <textarea name="description" id="ckeditor"
                                                      class="mb-6 focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                {{$recipe->description, old('description')}}
                                            </textarea>
                                            <div class="max-w-sm px-8 py-6">
                                                <img src="{{$recipe->getFirstMediaUrl('recipe_cover')}}" alt="">
                                            </div>
                                            <div class="w-full mt-6 p-8 mx-auto bg-white border rounded-lg">
                                                <div class="" x-data="imageData()">
                                                    <div x-show="previewUrl == ''">
                                                        <p class="text-center uppercase text-bold">
                                                            <label for="image" class="cursor-pointer">
                                                                {{__('custom.recipes.create.change_image')}}
                                                            </label>
                                                            <input type="file" name="image" id="image" class="hidden" @change="updatePreview()">
                                                        </p>
                                                    </div>
                                                    <div x-show="previewUrl !== ''">
                                                        <img :src="previewUrl" alt="" class="rounded">
                                                        <div class="">
                                                            <button type="button" class="" @click="clearPreview()">
                                                                {{__('custom.recipes.create.change_image')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    <h1 class="text-2xl mt-4">{{__('custom.recipes.edit.add_products')}}</h1>

                    <form action="{{route('recipe_items.store', $recipe->id)}}" method="post">
                        @method('POST')
                        @csrf
                        <div class="flex col-span-2 sm:col-span-2">
                            <div class="w-1/2">
                                <x-jet-label for="name" class="block text-sm font-medium text-gray-700">
                                    {{__('custom.shopping_lists.show.choose_product')}}
                                </x-jet-label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select class="livesearch w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border
                                     rounded-lg appearance-none focus:shadow-outline" name="name"></select>
                                </div>
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
                        {{--                        <p>{{__('custom.recipes.show.no_product_on_list')}} <a href="">{{__('custom.global.there')}}</a></p>--}}
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                    <h1 class="text-2xl mt-4">{{__('custom.recipes.edit.preview')}}</h1>
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
        @include('partials.imageUpload')
        @include('recipes.ckeditor')
        @include('partials.select2')
    @endsection
</x-app-layout>
