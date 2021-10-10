<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.recipes.index.header') }}
        </h2>
    </x-slot>
    @if(auth()->user()->subscribed('premium'))
        <div
            x-data="{
      openTab: 1,
      activeClasses: 'bg-gray-200 rounded-t text-blue-700',
      inactiveClasses: 'text-blue-500 hover:text-blue-800'
    }"
            class="p-6"
        >
            <ul class="flex border-b">
                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                    <a :class="openTab === 1 ? activeClasses : inactiveClasses"
                       class="inline-block py-2 px-4 font-semibold" href="#">
                        {{__('custom.recipes.index.public_recipes')}}
                    </a>
                </li>
                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                    <a :class="openTab === 2 ? activeClasses : inactiveClasses"
                       class="inline-block py-2 px-4 font-semibold" href="#">
                        {{__('custom.recipes.index.my_recipes')}}
                    </a>
                </li>
                <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
                    <a :class="openTab === 3 ? activeClasses : inactiveClasses"
                       class="inline-block py-2 px-4 font-semibold" href="#">
                        {{__('custom.recipes.index.team_recipes')}}
                    </a>
                </li>
                <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="mr-1">
                    <a :class="openTab === 4 ? activeClasses : inactiveClasses"
                       class="inline-block py-2 px-4 font-semibold" href="#">
                        {{__('custom.recipes.index.add')}}
                    </a>
                </li>
            </ul>
            <div class="w-full pt-4">
                <div x-show="openTab === 1">
                    <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                        <div class="mt-4">
                            <section class="container mx-auto p-6 font-mono">
                                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <thead>
                                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                                <th class="px-4 py-3">{{__('custom.recipes.index.name')}}</th>
                                                <th class="px-4 py-3">{{__('custom.recipes.index.recipe_items_count')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                            @forelse($publicRecipes as $recipe)
                                                <tr class="text-gray-700">
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                                @if($recipe->getFirstMedia('recipe_cover'))
                                                                    <img class="object-cover w-full h-full"
                                                                         src="{{$recipe->getFirstMediaUrl('recipe_cover')}}"
                                                                         alt="" loading="lazy"/>
                                                                @else
                                                                    <img class="object-cover w-full h-full"
                                                                         src="https://via.placeholder.com/150"
                                                                         alt="" loading="lazy"/>
                                                                @endif
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                     aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold text-black">{{$recipe->name}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 max-w-sm text-ms font-semibold border">{{$recipe->recipe_items_count}}</td>
                                                </tr>
                                            @empty
                                                {{__('custom.global.nothing_to_show')}}
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $publicRecipes->links() }}
                            </section>
                        </div>
                    </div>
                </div>
                <div x-show="openTab === 2">
                    <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                        <div class="mt-4">
                            <section class="container mx-auto p-6 font-mono">
                                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <thead>
                                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                                <th class="px-4 py-3">{{__('custom.recipes.index.name')}}</th>
                                                <th class="px-4 py-3">{{__('custom.recipes.index.recipe_items_count')}}</th>
                                                <th class="px-4 py-3">{{__('custom.recipes.index.status')}}</th>
                                                <th class="px-4 py-3">{{__('custom.recipes.index.actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                            @forelse($myRecipes as $recipe)
                                                <tr class="text-gray-700">
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                                @if($recipe->getFirstMedia('recipe_cover'))
                                                                    <img class="object-cover w-full h-full"
                                                                         src="{{$recipe->getFirstMediaUrl('recipe_cover')}}"
                                                                         alt="" loading="lazy"/>
                                                                @else
                                                                    <img class="object-cover w-full h-full"
                                                                         src="https://via.placeholder.com/150"
                                                                         alt="" loading="lazy"/>
                                                                @endif
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                     aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold text-black">{{$recipe->name}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 max-w-sm text-ms font-semibold border">{{$recipe->recipe_items_count}}</td>
                                                    <td class="px-4 py-3 text-xs border">
                                                        @if($recipe->is_public == 1)
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                                Publiczny
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-red-100 rounded-sm">
                                                                Niepubliczny
                                                            </span>
                                                        @endif

                                                        @if($recipe->team_id == 0)
                                                            <span
                                                                class="ml-2 px-2 py-1 font-semibold leading-tight text-green-700 bg-red-100 rounded-sm">
                                                                Nie udostępniony w zespole
                                                            </span>
                                                        @else
                                                            <span
                                                                class="ml-2 px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                                Udostępniony w zespole
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class=" text-sm border">
                                                        @if($recipe->user_id == auth()->id())
                                                            <div class="inline-flex ml-6">
                                                                <a href="{{route('recipes.edit', $recipe)}}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         class="h-5 w-5"
                                                                         viewBox="0 0 20 20" fill="currentColor">
                                                                        <path
                                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="inline-flex">
                                                                <form action="{{route('recipes.destroy', $recipe)}}"
                                                                      method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             class="h-5 w-5"
                                                                             viewBox="0 0 20 20" fill="currentColor">
                                                                            <path fill-rule="evenodd"
                                                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                                  clip-rule="evenodd"/>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @else
                                                            <p>Nie jesteś właścieielem</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                {{__('custom.global.nothing_to_show')}}
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $myRecipes->links() }}
                            </section>
                        </div>
                    </div>
                </div>
                <div x-show="openTab === 3">
                    <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                        <div class="mt-4">
                            <section class="container mx-auto p-6 font-mono">
                                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                                    <div class="w-full overflow-x-auto">
                                        <table class="w-full table-auto">
                                            <thead>
                                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                                <th class="px-4 py-3">{{__('custom.recipes.index.name')}}</th>
                                                <th class="px-4 py-3">{{__('custom.recipes.index.recipe_items_count')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                            @forelse($teamRecipes as $recipe)
                                                <tr class="text-gray-700">
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                                @if($recipe->getFirstMedia('recipe_cover'))
                                                                    <img class="object-cover w-full h-full"
                                                                         src="{{$recipe->getFirstMediaUrl('recipe_cover')}}"
                                                                         alt="" loading="lazy"/>
                                                                @else
                                                                    <img class="object-cover w-full h-full"
                                                                         src="https://via.placeholder.com/150"
                                                                         alt="" loading="lazy"/>
                                                                @endif
                                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                                     aria-hidden="true"></div>
                                                            </div>
                                                            <div>
                                                                <p class="font-semibold text-black">{{$recipe->name}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 max-w-sm text-ms font-semibold border">{{$recipe->recipe_items_count}}</td>
                                                </tr>
                                            @empty
                                                {{__('custom.global.nothing_to_show')}}
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $teamRecipes->links() }}
                            </section>
                        </div>
                    </div>
                </div>
                <div x-show="openTab === 4">
                    <div class="py-12 center">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="sm:px-6 lg:px-8">
                                <div class="flex gap-4 overflow-hidden sm:rounded-lg">
                                    <div class="sm:w-3/4 md:w-3/4 lg:w-3/4 2xl:w-3/4 w-full bg-white">
                                        <form action="{{route('recipes.store')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                    <div class="grid grid-cols-2 gap-6">
                                                        <div class="col-span-2 sm:col-span-2">
                                                            <x-jet-label for="name"
                                                                         class="block text-sm font-medium text-gray-700">
                                                                {{__('custom.recipes.create.name')}}
                                                            </x-jet-label>
                                                            <x-jet-input type="text" name="name" id="name"
                                                                         :value="old('name')"
                                                                         class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 mb-6">
                                                            </x-jet-input>
                                                            <x-jet-label
                                                                for="description">{{__('custom.recipes.create.description')}}</x-jet-label>
                                                            <textarea name="description" id="ckeditor" rows="5"
                                                                      class="focus:ring-indigo-500 focus:border-indigo-500 flex-1
                                                       block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                {{old('description')}}
                                            </textarea>
                                                            <div
                                                                class="w-full mt-6 p-8 mx-auto bg-white border rounded-lg">
                                                                <div class="" x-data="imageData()">
                                                                    <div x-show="previewUrl == ''">
                                                                        <p class="text-center uppercase text-bold">
                                                                            <label for="image" class="cursor-pointer">
                                                                                {{__('custom.recipes.create.image')}}
                                                                            </label>
                                                                            <input type="file" name="image" id="image"
                                                                                   class="hidden"
                                                                                   @change="updatePreview()">
                                                                        </p>
                                                                    </div>
                                                                    <div x-show="previewUrl !== ''">
                                                                        <img :src="previewUrl" alt="" class="rounded">
                                                                        <div class="">
                                                                            <button type="button" class=""
                                                                                    @click="clearPreview()">
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
                </div>
            </div>
        </div>

    @else
        {{__('custom.global.messages.dont_have_active_subscription')}}. <a
            href="{{route('subscription.show')}}">{{__('custom.global.get_subscription')}}</a>
    @endif
    @section('scripts')
        @include('partials.imageUpload')
        @include('partials.ckeditor')
        @include('partials.select2')
    @endsection
</x-app-layout>
