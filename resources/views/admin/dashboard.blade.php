<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.admin_panel.header') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 2xl:grid-cols-3 px-8 gap-6 mt-6">
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-black font-semibold text-xl">saldo:</p>
            <p class="text-xs">Suma udanych transakcji w PLN</p> <br>
            <p>{{ $balance }} PLN</p>
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-black font-semibold text-xl">saldo programu partnerskiego</p>
            <p class="text-xs">Program partnerski w przygotowaniu</p>
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-black font-semibold text-xl">Wiadomości</p>
            <p class="text-xs">W przygotowaniu</p>
            <button class="bg-gray-600 text-white py-2 px-2">Dodaj</button>
        </div>
    </div>

    <div
        x-data="{
      openTab: 1,
      activeClasses: 'bg-gray-200 rounded-t text-blue-700',
      inactiveClasses: 'text-blue-500 hover:text-blue-800'
    }"
        class="p-6 mt-24"
    >
        <ul class="flex border-b">
            <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                <a :class="openTab === 1 ? activeClasses : inactiveClasses"
                   class="inline-block py-2 px-4 font-semibold" href="#">
                    {{__('custom.admin_panel.premium_users')}}
                </a>
            </li>
            <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                <a :class="openTab === 2 ? activeClasses : inactiveClasses"
                   class="inline-block py-2 px-4 font-semibold" href="#">
                    {{__('custom.admin_panel.free_users')}}
                </a>
            </li>
        </ul>
        <div class="w-full pt-4">
            <div x-show="openTab === 1">
                <div class="w-full mb-12 xl:mb-0 px-4 mx-auto ">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center bg-transparent w-full border-collapse ">
                                <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.name')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.email')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.status')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.amount_referrals')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.manual_disabled')}}
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($subscribers as $user)
                                    <tr>
                                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                            {{ $user->name }}
                                        </th>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                            {{ $user->email }}
                                        </td>
                                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            @if($user->status == 'disabled')
                                                <p class="p-1 bg-red-200">{{__('custom.admin_panel.disabled')}}</p>
                                            @else
                                                <p class="p-1 bg-green-200">{{__('custom.admin_panel.enabled')}}</p>                                            @endif
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            wkrótce ..
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs text-center whitespace-nowrap p-4">
                                            @if($user->status == 'disabled')
                                                <a class="py-2 px-1 text-xs text-white bg-green-400 rounded"
                                                   href="{{route('users.changeStatus', $user)}}">{{__('custom.admin_panel.turn_on')}}</a>
                                            @else
                                                <a class="py-2 px-1 text-xs text-white bg-red-400 rounded"
                                                   href="{{route('users.changeStatus', $user)}}">{{__('custom.admin_panel.turn_off')}}</a>
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
                    {{ $subscribers->links() }}
                </div>
            </div>
            <div x-show="openTab === 2">
                <div class="w-full mb-12 xl:mb-0 px-4 mx-auto ">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center bg-transparent w-full border-collapse ">
                                <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.name')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.email')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.status')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.amount_referrals')}}
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        {{__('custom.admin_panel.manual_disabled')}}
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($freeUsers as $user)
                                    <tr>
                                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                            {{ $user->name }}
                                        </th>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                            {{ $user->email }}
                                        </td>
                                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            @if($user->status == 'disabled')
                                                <p class="p-1 bg-red-200">{{__('custom.admin_panel.disabled')}}</p>
                                            @else
                                                <p class="p-1 bg-green-200">{{__('custom.admin_panel.enabled')}}</p>
                                            @endif
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            wkrótce ..
                                        </td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs text-center whitespace-nowrap p-4">
                                            @if($user->status == 'disabled')
                                                <a class="py-2 px-1 text-xs text-white bg-green-400 rounded"
                                                   href="{{route('users.changeStatus', $user)}}">{{__('custom.admin_panel.turn_on')}}</a>
                                            @else
                                                <a class="py-2 px-1 text-xs text-white bg-red-400 rounded"
                                                   href="{{route('users.changeStatus', $user)}}">{{__('custom.admin_panel.turn_off')}}</a>
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
                    {{ $freeUsers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
