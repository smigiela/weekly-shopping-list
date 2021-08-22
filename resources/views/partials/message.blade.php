@if (session()->has('message'))
    <div class="text-white px-8 py-4 border-0 rounded relative mb-4 bg-green-400">
          <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell"/>
          </span>
          <span class="inline-block align-middle mr-8">
            <b class="capitalize">{!! session('message') !!}</b>
          </span>
{{--        <button--}}
{{--            class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">--}}
{{--            <span>×</span>--}}
{{--        </button>--}}
    </div>
@endif
