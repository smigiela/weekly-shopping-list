<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Weekly Shopping APP') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="">
<div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <nav
            class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
        >
            <div
                class="container px-4 mx-auto flex flex-wrap items-center justify-between"
            >
                <div
                    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
                >
                    <a
                        class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                        href="{{route('welcome')}}"
                    >{{ config('app.name', 'Weekly Shopping APP') }}</a>
                    <button
                        class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                        type="button"
                        onclick="toggleNavbar('example-collapse-navbar')"
                    >
                        <i class="text-white fas fa-bars"></i>
                    </button>
                </div>
                <div
                    class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                    id="example-collapse-navbar"
                >
                    <ul class="flex flex-col lg:flex-row list-none mr-auto">
                        <li class="flex items-center">
                            <a
                                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href=""
                            ><i class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"
                                ></i>
                                {{__('custom.home_page.nav.instruction')}}</a>
                        </li>
                    </ul>
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                        <li class="flex items-center">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                       class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                       type="button"
                                       style="transition: all 0.15s ease 0s;"
                                    >
                                        <i class="fas fa-arrow-alt-circle-down"></i> {{__('custom.global.dashboard')}}
                                    </a>
                                @else
                                    <a href="{{ url('login') }}"
                                       class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                       type="button"
                                       style="transition: all 0.15s ease 0s;"
                                    >
                                        <i class="fas fa-arrow-alt-circle-down"></i> {{__('custom.global.login')}}
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ url('register') }}"
                                           class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                           type="button"
                                           style="transition: all 0.15s ease 0s;"
                                        >
                                            <i class="fas fa-arrow-alt-circle-down"></i> {{__('custom.global.register')}}
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<main>
    <div
        class="relative pt-16 pb-32 flex content-center items-center justify-center"
        style="min-height: 75vh;"
    >
        <div
            class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'
        >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">
                            {{__('custom.home_page.header.bold_text')}}
                        </h1>
                        <p class="mt-4 text-lg text-gray-300">
                            {{__('custom.home_page.header.subtitle')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;"
        >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                    class="text-gray-300 fill-current"
                    points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
        </div>
    </div>
    <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    >
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
                            >
                                <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">{{__('custom.home_page.first_section.first_card.title')}}</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                {{__('custom.home_page.first_section.first_card.subtitle')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    >
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400"
                            >
                                <i class="fas fa-retweet"></i>
                            </div>
                            <h6 class="text-xl font-semibold">{{__('custom.home_page.first_section.second_card.title')}}</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Keep you user engaged by providing meaningful information.
                                {{__('custom.home_page.first_section.second_card.subtitle')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                    >
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400"
                            >
                                <i class="fas fa-fingerprint"></i>
                            </div>
                            <h6 class="text-xl font-semibold">{{__('custom.home_page.first_section.third_card.title')}}</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                {{__('custom.home_page.first_section.third_card.subtitle')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div
                        class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                    >
                        <i class="fas fa-user-friends text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal">
                        {{__('custom.home_page.first_section.title')}}
                    </h3>
                    <p
                        class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                    >
                        {{__('custom.home_page.first_section.text')}}
                    </p>
                    <p
                        class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700"
                    >
                        {{__('custom.home_page.first_section.text2')}}

                    </p>
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-600"
                    >
                        <img
                            alt="..."
                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80"
                            class="w-full align-middle rounded-t-lg"
                        />
                        <blockquote class="relative p-8 mb-4">
                            <svg
                                preserveAspectRatio="none"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 583 95"
                                class="absolute left-0 w-full block"
                                style="height: 95px; top: -94px;"
                            >
                                <polygon
                                    points="-30,95 583,95 583,65"
                                    class="text-pink-600 fill-current"
                                ></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                                {{__('custom.home_page.first_section.card_title')}}
                            </h4>
                            <p class="text-md font-light mt-2 text-white">
                                {{__('custom.home_page.first_section.card_text')}}
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20">
        <div
            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;"
        >
            <svg
                class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0"
            >
                <polygon
                    class="text-white fill-current"
                    points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                    <img
                        alt="..."
                        class="max-w-full rounded-lg shadow-lg"
                        src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
                    />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                        <div
                            class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
                        >
                            <i class="fas fa-rocket text-xl"></i>
                        </div>
                        <h3 class="text-3xl font-semibold">{{__('custom.home_page.second_section.title')}}
                        </h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            {{__('custom.home_page.second_section.text')}}
                        </p>
                        <ul class="list-none mt-6">
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                        ><i class="fas fa-fingerprint"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">
                                            {{__('custom.home_page.second_section.first_li')}}
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                        ><i class="fab fa-html5"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">{{__('custom.home_page.second_section.second_li')}}</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                        ><i class="far fa-paper-plane"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">{{__('custom.home_page.second_section.third_li')}}</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <section class="pt-20 pb-48">--}}
{{--        <div class="container mx-auto px-4">--}}
{{--            <div class="flex flex-wrap justify-center text-center mb-24">--}}
{{--                <div class="w-full lg:w-6/12 px-4">--}}
{{--                    <h2 class="text-4xl font-semibold">Here are our heroes</h2>--}}
{{--                    <p class="text-lg leading-relaxed m-4 text-gray-600">--}}
{{--                        According to the National Oceanic and Atmospheric--}}
{{--                        Administration, Ted, Scambos, NSIDClead scentist, puts the--}}
{{--                        potentially record maximum.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap">--}}
{{--                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">--}}
{{--                    <div class="px-6">--}}
{{--                        <img--}}
{{--                            alt="..."--}}
{{--                            src="./vendor/assets/img/team-1-800x800.jpg"--}}
{{--                            class="shadow-lg rounded-full max-w-full mx-auto"--}}
{{--                            style="max-width: 120px;"--}}
{{--                        />--}}
{{--                        <div class="pt-6 text-center">--}}
{{--                            <h5 class="text-xl font-bold">Ryan Tompson</h5>--}}
{{--                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">--}}
{{--                                Web Developer--}}
{{--                            </p>--}}
{{--                            <div class="mt-6">--}}
{{--                                <button--}}
{{--                                    class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-twitter"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-facebook-f"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-dribbble"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">--}}
{{--                    <div class="px-6">--}}
{{--                        <img--}}
{{--                            alt="..."--}}
{{--                            src="./vendor/assets/img/team-2-800x800.jpg"--}}
{{--                            class="shadow-lg rounded-full max-w-full mx-auto"--}}
{{--                            style="max-width: 120px;"--}}
{{--                        />--}}
{{--                        <div class="pt-6 text-center">--}}
{{--                            <h5 class="text-xl font-bold">Romina Hadid</h5>--}}
{{--                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">--}}
{{--                                Marketing Specialist--}}
{{--                            </p>--}}
{{--                            <div class="mt-6">--}}
{{--                                <button--}}
{{--                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-google"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">--}}
{{--                    <div class="px-6">--}}
{{--                        <img--}}
{{--                            alt="..."--}}
{{--                            src="./vendor/assets/img/team-3-800x800.jpg"--}}
{{--                            class="shadow-lg rounded-full max-w-full mx-auto"--}}
{{--                            style="max-width: 120px;"--}}
{{--                        />--}}
{{--                        <div class="pt-6 text-center">--}}
{{--                            <h5 class="text-xl font-bold">Alexa Smith</h5>--}}
{{--                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">--}}
{{--                                UI/UX Designer--}}
{{--                            </p>--}}
{{--                            <div class="mt-6">--}}
{{--                                <button--}}
{{--                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-google"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-twitter"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-instagram"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">--}}
{{--                    <div class="px-6">--}}
{{--                        <img--}}
{{--                            alt="..."--}}
{{--                            src="./vendor/assets/img/team-4-470x470.png"--}}
{{--                            class="shadow-lg rounded-full max-w-full mx-auto"--}}
{{--                            style="max-width: 120px;"--}}
{{--                        />--}}
{{--                        <div class="pt-6 text-center">--}}
{{--                            <h5 class="text-xl font-bold">Jenna Kardi</h5>--}}
{{--                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">--}}
{{--                                Founder and CEO--}}
{{--                            </p>--}}
{{--                            <div class="mt-6">--}}
{{--                                <button--}}
{{--                                    class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-dribbble"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-google"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-twitter"></i></button--}}
{{--                                >--}}
{{--                                <button--}}
{{--                                    class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                >--}}
{{--                                    <i class="fab fa-instagram"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="pb-20 relative block bg-gray-900">--}}
{{--        <div--}}
{{--            class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"--}}
{{--            style="height: 80px;"--}}
{{--        >--}}
{{--            <svg--}}
{{--                class="absolute bottom-0 overflow-hidden"--}}
{{--                xmlns="http://www.w3.org/2000/svg"--}}
{{--                preserveAspectRatio="none"--}}
{{--                version="1.1"--}}
{{--                viewBox="0 0 2560 100"--}}
{{--                x="0"--}}
{{--                y="0"--}}
{{--            >--}}
{{--                <polygon--}}
{{--                    class="text-gray-900 fill-current"--}}
{{--                    points="2560 0 2560 100 0 100"--}}
{{--                ></polygon>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">--}}
{{--            <div class="flex flex-wrap text-center justify-center">--}}
{{--                <div class="w-full lg:w-6/12 px-4">--}}
{{--                    <h2 class="text-4xl font-semibold text-white">Build something</h2>--}}
{{--                    <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">--}}
{{--                        Put the potentially record low maximum sea ice extent tihs year--}}
{{--                        down to low ice. According to the National Oceanic and--}}
{{--                        Atmospheric Administration, Ted, Scambos.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-wrap mt-12 justify-center">--}}
{{--                <div class="w-full lg:w-3/12 px-4 text-center">--}}
{{--                    <div--}}
{{--                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"--}}
{{--                    >--}}
{{--                        <i class="fas fa-medal text-xl"></i>--}}
{{--                    </div>--}}
{{--                    <h6 class="text-xl mt-5 font-semibold text-white">--}}
{{--                        Excelent Services--}}
{{--                    </h6>--}}
{{--                    <p class="mt-2 mb-4 text-gray-500">--}}
{{--                        Some quick example text to build on the card title and make up--}}
{{--                        the bulk of the card's content.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="w-full lg:w-3/12 px-4 text-center">--}}
{{--                    <div--}}
{{--                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"--}}
{{--                    >--}}
{{--                        <i class="fas fa-poll text-xl"></i>--}}
{{--                    </div>--}}
{{--                    <h5 class="text-xl mt-5 font-semibold text-white">--}}
{{--                        Grow your market--}}
{{--                    </h5>--}}
{{--                    <p class="mt-2 mb-4 text-gray-500">--}}
{{--                        Some quick example text to build on the card title and make up--}}
{{--                        the bulk of the card's content.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="w-full lg:w-3/12 px-4 text-center">--}}
{{--                    <div--}}
{{--                        class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"--}}
{{--                    >--}}
{{--                        <i class="fas fa-lightbulb text-xl"></i>--}}
{{--                    </div>--}}
{{--                    <h5 class="text-xl mt-5 font-semibold text-white">Launch time</h5>--}}
{{--                    <p class="mt-2 mb-4 text-gray-500">--}}
{{--                        Some quick example text to build on the card title and make up--}}
{{--                        the bulk of the card's content.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="relative block py-24 lg:pt-0 bg-gray-900">--}}
{{--        <div class="container mx-auto px-4">--}}
{{--            <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">--}}
{{--                <div class="w-full lg:w-6/12 px-4">--}}
{{--                    <div--}}
{{--                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"--}}
{{--                    >--}}
{{--                        <div class="flex-auto p-5 lg:p-10">--}}
{{--                            <h4 class="text-2xl font-semibold">Want to work with us?</h4>--}}
{{--                            <p class="leading-relaxed mt-1 mb-4 text-gray-600">--}}
{{--                                Complete this form and we will get back to you in 24 hours.--}}
{{--                            </p>--}}
{{--                            <div class="relative w-full mb-3 mt-8">--}}
{{--                                <label--}}
{{--                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"--}}
{{--                                    for="full-name"--}}
{{--                                >Full Name</label--}}
{{--                                ><input--}}
{{--                                    type="text"--}}
{{--                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"--}}
{{--                                    placeholder="Full Name"--}}
{{--                                    style="transition: all 0.15s ease 0s;"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                            <div class="relative w-full mb-3">--}}
{{--                                <label--}}
{{--                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"--}}
{{--                                    for="email"--}}
{{--                                >Email</label--}}
{{--                                ><input--}}
{{--                                    type="email"--}}
{{--                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"--}}
{{--                                    placeholder="Email"--}}
{{--                                    style="transition: all 0.15s ease 0s;"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                            <div class="relative w-full mb-3">--}}
{{--                                <label--}}
{{--                                    class="block uppercase text-gray-700 text-xs font-bold mb-2"--}}
{{--                                    for="message"--}}
{{--                                >Message</label--}}
{{--                                ><textarea--}}
{{--                                    rows="4"--}}
{{--                                    cols="80"--}}
{{--                                    class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"--}}
{{--                                    placeholder="Type a message..."--}}
{{--                                ></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="text-center mt-6">--}}
{{--                                <button--}}
{{--                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"--}}
{{--                                    type="button"--}}
{{--                                    style="transition: all 0.15s ease 0s;"--}}
{{--                                >--}}
{{--                                    Send Message--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
</main>
<footer class="relative bg-gray-300 pt-8 pb-6">
    <div
        class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px;"
    >
        <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
        >
            <polygon
                class="text-gray-300 fill-current"
                points="2560 0 2560 100 0 100"
            ></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">{{__('custom.home_page.footer.title')}}</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">{{__('custom.home_page.footer.subtitle')}}</h5>
                <div class="mt-6">
                    <button
                        class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        type="button"
                    >
                        <i class="flex fab fa-twitter"></i></button
                    >
                    <button
                        class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        type="button"
                    >
                        <i class="flex fab fa-facebook-square"></i></button
                    >
                    <button
                        class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        type="button"
                    >
                        <i class="flex fab fa-dribbble"></i></button
                    >
                    <button
                        class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                        type="button"
                    >
                        <i class="flex fab fa-github"></i>
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">

                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                <span
                    class="block uppercase text-gray-600 text-sm font-semibold mb-2"
                >{{__('custom.home_page.footer.link_list_title')}}</span
                >
                        <ul class="list-unstyled">
                            <li>
                                <a
                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href=""
                                >{{__('custom.home_page.footer.license')}}</a
                                >
                            </li>
                            <li>
                                <a
                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/terms"
                                >{{__('custom.home_page.footer.terms')}}</a
                                >
                            </li>
                            <li>
                                <a
                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/privacy"
                                >{{__('custom.home_page.footer.privacy_policy')}}</a
                                >
                            </li>
                            <li>
                                <a
                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="https://creative-tim.com/contact-us"
                                >Contact Us</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400"/>
        <div
            class="flex flex-wrap items-center md:justify-between justify-center"
        >
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © 2021 Weekly Shopping APP by
                    <a
                        href="https://www.facebook.com/smigielapl"
                        class="text-gray-600 hover:text-gray-900"
                    >Daniel Śmigiela</a
                    >.
                </div>
            </div>
        </div>
    </div>
</footer>
{{--            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">--}}
{{--                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">--}}
{{--                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">--}}
{{--                        <g clip-path="url(#clip0)" fill="#EF3B2D">--}}
{{--                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>--}}
{{--                        </g>--}}
{{--                    </svg>--}}
{{--                </div>--}}

{{--                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">--}}
{{--                    <div class="grid grid-cols-1 md:grid-cols-2">--}}
{{--                        <div class="p-6">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>--}}
{{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>--}}
{{--                            </div>--}}

{{--                            <div class="ml-12">--}}
{{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
{{--                                    Ldasdsad aravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>--}}
{{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>--}}
{{--                            </div>--}}

{{--                            <div class="ml-12">--}}
{{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
{{--                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>--}}
{{--                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>--}}
{{--                            </div>--}}

{{--                            <div class="ml-12">--}}
{{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
{{--                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>--}}
{{--                            </div>--}}

{{--                            <div class="ml-12">--}}
{{--                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">--}}
{{--                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">--}}
{{--                    <div class="text-center text-sm text-gray-500 sm:text-left">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">--}}
{{--                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>--}}
{{--                            </svg>--}}

{{--                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">--}}
{{--                                Shop--}}
{{--                            </a>--}}

{{--                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">--}}
{{--                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>--}}
{{--                            </svg>--}}

{{--                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">--}}
{{--                                Sponsor--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">--}}
{{--                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
</div>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("flex");
    }
</script>
</body>
</html>
