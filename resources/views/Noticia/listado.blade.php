<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FUTBOL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            margin: 0px;
            font-family: 'Nunito', sans-serif;
        }

        div.fondo {
            background-image: url('{{asset('fondo.jpg')}}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="fondo relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        <span style="color:white">Inicio </span></a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        <span style="color:white">Iniciar sesión</span></a>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                            <span style="color:white">Registrarse</span></a>
                    @endif --}}
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

                <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#"
                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns="http://www.w3.org/2000/svg" id="svg6131" version="1.1" viewBox="0 0 43.73442 38.34119"
                    height="38.34119mm" width="43.734421mm">
                    <defs id="defs6125">
                        <clipPath id="clipPath68" clipPathUnits="userSpaceOnUse">
                            <path id="path66"
                                d="m 76.863,433.597 -10.934,-5.377 3.399,-8.258 0.392,-0.951 10.294,0.902 -6.141,-1.985 1.273,-3.353 2.159,-5.677 0.424,-0.407 8.784,-8.44 -6.14,3.971 -2.527,-4.695 6.682,-5.776 c 0,0 0.04,0.007 0.119,0.024 v 0 c 0.756,0.152 4.937,0.945 8.819,0.972 v 0 c 1.861,0.017 3.654,-0.143 4.965,-0.637 v 0 l 4.876,21.669 -15.35,17.153 -11.013,0.905 z" />
                        </clipPath>
                        <linearGradient id="linearGradient80" spreadMethod="pad"
                            gradientTransform="matrix(36.5816,7.6799507,7.6799507,-36.5816,101.80688,382.58735)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0" x1="0">
                            <stop id="stop74" offset="0" style="stop-opacity:1;stop-color:#f68e3d" />
                            <stop id="stop76" offset="0.6461618" style="stop-opacity:1;stop-color:#faaf40" />
                            <stop id="stop78" offset="1" style="stop-opacity:1;stop-color:#faaf40" />
                        </linearGradient>
                        <clipPath id="clipPath90" clipPathUnits="userSpaceOnUse">
                            <path id="path88"
                                d="m 69.856,396.891 2.979,-2.574 c -1.516,-0.248 -3.031,-0.715 -4.477,-1.302 v 0 c -5.647,-2.294 -10.284,-6.417 -10.284,-6.417 v 0 c 1.536,-1.024 3.987,-5.33 5.587,-8.376 v 0 c 0.943,-1.784 1.591,-3.136 1.591,-3.136 v 0 l 15.931,6.275 -1.929,6.066 4.535,-6.108 10.174,-12.463 c 1.569,0.066 2.991,0.272 4.27,0.564 v 0 c 2.766,0.634 4.87,1.693 6.382,2.706 v 0 c 2.072,1.389 3.025,2.69 3.025,2.69 v 0 c -6.094,5.417 -7.448,15.844 -7.448,15.844 v 0 l -1.897,2.709 c -1.43,0.217 -2.867,0.32 -4.257,0.343 v 0 c -5.59,0.109 -10.046,-1.484 -10.046,-1.484 v 0 l -5.287,4.901 -1.4,1.251 z" />
                        </clipPath>
                        <linearGradient id="linearGradient102" spreadMethod="pad"
                            gradientTransform="matrix(1.1693712,-50.679634,-50.679634,-1.1693712,110.50122,385.76851)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0" x1="0">
                            <stop id="stop96" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop98" offset="0.18826557" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop100" offset="1" style="stop-opacity:1;stop-color:#0f5184" />
                        </linearGradient>
                        <clipPath id="clipPath112" clipPathUnits="userSpaceOnUse">
                            <path id="path110"
                                d="m 74.667,455.585 c -1.541,-0.072 -3.157,-0.38 -4.758,-1.049 v 0 c 0,0 -0.678,-1.581 -0.754,-3.803 v 0 c 0.693,0.559 1.734,1.238 3.19,1.834 v 0 c 0.783,0.317 1.684,0.612 2.717,0.848 v 0 c 2.126,0.49 4.81,0.739 8.149,0.463 v 0 c -1.438,0.631 -3.859,1.494 -6.673,1.685 v 0 c -0.368,0.026 -0.742,0.04 -1.122,0.04 v 0 c -0.248,0 -0.498,-0.006 -0.749,-0.018" />
                        </clipPath>
                        <linearGradient id="linearGradient124" spreadMethod="pad"
                            gradientTransform="matrix(14.056641,0,0,-14.056641,97.566155,424.98091)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0" x1="0">
                            <stop id="stop118" offset="0" style="stop-opacity:1;stop-color:#0f5184" />
                            <stop id="stop120" offset="0.81173443" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop122" offset="1" style="stop-opacity:1;stop-color:#1b75bb" />
                        </linearGradient>
                        <clipPath id="clipPath134" clipPathUnits="userSpaceOnUse">
                            <path id="path132"
                                d="m 74.271,452.497 c -1.135,-0.345 -2.297,-0.78 -3.456,-1.328 v 0 c -0.556,-0.263 -1.114,-0.55 -1.666,-0.867 v 0 c 0,-0.154 0.006,-0.308 0.012,-0.468 v 0 c 0.018,-0.439 0.064,-0.899 0.145,-1.368 v 0 c 0.003,-0.013 0.006,-0.027 0.008,-0.04 v 0 c 0,0 9.735,2.974 15.033,-0.813 v 0 l 0.271,5.571 c 0,0 -0.38,0.222 -1.055,0.534 v 0 c -0.25,0.007 -0.514,0.011 -0.791,0.011 v 0 c -2.203,-10e-4 -5.246,-0.245 -8.501,-1.232" />
                        </clipPath>
                        <linearGradient id="linearGradient146" spreadMethod="pad"
                            gradientTransform="matrix(15.46875,0,0,-15.46875,97.560295,422.48384)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop140" offset="0" style="stop-opacity:1;stop-color:#0f5184" />
                            <stop id="stop142" offset="0.81173443" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop144" offset="1" style="stop-opacity:1;stop-color:#1b75bb" />
                        </linearGradient>
                        <clipPath id="clipPath156" clipPathUnits="userSpaceOnUse">
                            <path id="path154" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath168" clipPathUnits="userSpaceOnUse">
                            <path id="path166"
                                d="m 98.532,368.905 c -1.702,-0.443 -2.899,-0.579 -2.899,-0.579 v 0 l 9.275,-9.275 14.761,-0.966 c 0.376,0.341 0.747,0.904 1.089,1.565 v 0 c 1.124,2.16 1.974,5.371 1.974,5.371 v 0 l -6.421,3.706 -7.934,-2.335 -1.453,6.855 c -2.472,-2.424 -5.953,-3.699 -8.392,-4.342" />
                        </clipPath>
                        <linearGradient id="linearGradient180" spreadMethod="pad"
                            gradientTransform="matrix(19.249741,19.074026,19.074026,-19.249741,124.63745,323.6938)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop174" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop176" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop178" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath190" clipPathUnits="userSpaceOnUse">
                            <path id="path188" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath202" clipPathUnits="userSpaceOnUse">
                            <path id="path200" d="m 84.715,448.828 1.126,0.45 v 1.426 l -1.05,1.05 z" />
                        </clipPath>
                        <linearGradient id="linearGradient214" spreadMethod="pad"
                            gradientTransform="matrix(0.1143286,-4.9549112,-4.9549112,-0.1143286,113.60913,425.08833)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop208" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop210" offset="0.18826557" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop212" offset="1" style="stop-opacity:1;stop-color:#0f5184" />
                        </linearGradient>
                        <clipPath id="clipPath224" clipPathUnits="userSpaceOnUse">
                            <path id="path222"
                                d="m 85.467,451.83 0.9,-0.826 3.827,1.652 0.826,2.926 c 0,0 -3.302,-1.276 -5.553,-3.752" />
                        </clipPath>
                        <linearGradient id="linearGradient236" spreadMethod="pad"
                            gradientTransform="matrix(0.1747679,-7.5743027,-7.5743027,-0.1747679,116.55932,429.6396)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop230" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop232" offset="0.18826557" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop234" offset="1" style="stop-opacity:1;stop-color:#0f5184" />
                        </linearGradient>
                        <clipPath id="clipPath246" clipPathUnits="userSpaceOnUse">
                            <path id="path244"
                                d="m 86.142,449.354 c 2.401,-2.102 5.327,-2.627 5.327,-2.627 v 0 c -1.35,2.927 -5.253,3.752 -5.253,3.752 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient258" spreadMethod="pad"
                            gradientTransform="matrix(0.1514515,-6.5637889,-6.5637889,-0.1514515,117.11303,424.352)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop252" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop254" offset="0.18826557" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop256" offset="1" style="stop-opacity:1;stop-color:#0f5184" />
                        </linearGradient>
                        <clipPath id="clipPath268" clipPathUnits="userSpaceOnUse">
                            <path id="path266" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath292" clipPathUnits="userSpaceOnUse">
                            <path id="path290"
                                d="m 53.555,383.737 -4.696,-21.711 3.359,-0.969 2.069,-0.596 6.471,10.438 -0.731,4.279 3.339,0.835 c -0.281,0.897 -0.764,1.968 -1.333,3.077 v 0 c -1.747,3.407 -4.303,7.15 -4.303,7.15 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient304" spreadMethod="pad"
                            gradientTransform="matrix(14.506836,0,0,-14.506836,77.270743,345.16353)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop298" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop300" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop302" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath314" clipPathUnits="userSpaceOnUse">
                            <path id="path312" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath330" clipPathUnits="userSpaceOnUse">
                            <path id="path328"
                                d="m 69.582,448.233 0.252,-1.094 0.447,-1.931 1.571,-1.108 -0.699,-1.98 0.992,-3.957 3.063,-4.686 0.021,-0.033 c 7.162,0.933 9.258,8.27 9.258,8.27 v 0 c 0,0 1.748,1.281 2.214,2.562 v 0 c 0.466,1.281 -0.466,3.145 -0.466,3.145 v 0 l -1.921,-1.281 -0.06,0.988 c -1.887,1.351 -4.935,1.731 -7.765,1.731 v 0 c -3.633,0 -6.907,-0.626 -6.907,-0.626" />
                        </clipPath>
                        <linearGradient id="linearGradient342" spreadMethod="pad"
                            gradientTransform="matrix(17.249023,0,0,-17.249023,97.993395,412.96431)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop336" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop338" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop340" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath352" clipPathUnits="userSpaceOnUse">
                            <path id="path350" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath368" clipPathUnits="userSpaceOnUse">
                            <path id="path366" d="M 76.8628,433.637 H 103.307 V 393.911 H 76.8628 Z" />
                        </clipPath>
                        <clipPath id="clipPath404" clipPathUnits="userSpaceOnUse">
                            <path id="path402" d="M 91.1968,393.712 H 107.64 V 372.126 H 91.1968 Z" />
                        </clipPath>
                        <clipPath id="clipPath420" clipPathUnits="userSpaceOnUse">
                            <path id="path418"
                                d="m 136.169,363.7 c 0.567,-1.547 1.783,-4.301 3.882,-6.658 v 0 c -0.171,0.136 -2.964,2.234 -4.6,6.622 v 0 c -0.909,-0.119 -1.839,-0.56 -3.179,-1.779 v 0 c 0,0 2.339,-4.545 0.4,-7.086 v 0 l 4.514,-3.201 2.238,-5.756 c 0,0 1.082,-0.721 2.245,-1.145 v 0 l 0.877,-0.247 c 0.821,-0.152 1.556,-0.018 1.825,0.788 v 0 c 0.736,2.208 -0.802,9.561 -0.802,9.561 v 0 c 0,0 -5.883,7.354 -6.084,8.692 v 0 c 0,0 -0.449,0.21 -1.207,0.21 v 0 c -0.036,0 -0.072,0 -0.109,-0.001" />
                        </clipPath>
                        <linearGradient id="linearGradient432" spreadMethod="pad"
                            gradientTransform="matrix(12.29834,0,0,-12.29834,160.68334,325.86128)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop426" offset="0" style="stop-opacity:1;stop-color:#0f5184" />
                            <stop id="stop428" offset="0.81173443" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop430" offset="1" style="stop-opacity:1;stop-color:#1b75bb" />
                        </linearGradient>
                        <clipPath id="clipPath442" clipPathUnits="userSpaceOnUse">
                            <path id="path440" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath462" clipPathUnits="userSpaceOnUse">
                            <path id="path460"
                                d="m 49.669,435.275 0.111,-0.189 3.076,-6.423 c 1.2,0.842 3.858,2.902 7.61,2.77 v 0 l -3.297,5.126 -0.56,0.306 c -0.507,0.123 -1.228,0.234 -2.047,0.234 v 0 c -1.534,0 -3.416,-0.39 -4.893,-1.824" />
                        </clipPath>
                        <linearGradient id="linearGradient474" spreadMethod="pad"
                            gradientTransform="matrix(10.795898,0,0,-10.795898,78.080802,404.69429)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop468" offset="0" style="stop-opacity:1;stop-color:#f68e3d" />
                            <stop id="stop470" offset="0.6461618" style="stop-opacity:1;stop-color:#faaf40" />
                            <stop id="stop472" offset="1" style="stop-opacity:1;stop-color:#faaf40" />
                        </linearGradient>
                        <clipPath id="clipPath484" clipPathUnits="userSpaceOnUse">
                            <path id="path482"
                                d="m 53.516,428.163 3.883,-8.111 0.878,-1.832 10.292,1.219 -2.505,7.449 -0.265,-0.063 -3.256,-0.751 -0.903,2.396 -1.099,2.312 c -1.698,-0.198 -4.965,-0.799 -7.025,-2.619" />
                        </clipPath>
                        <linearGradient id="linearGradient496" spreadMethod="pad"
                            gradientTransform="matrix(15.053711,0,0,-15.053711,81.926993,396.31392)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop490" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop492" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop494" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath506" clipPathUnits="userSpaceOnUse">
                            <path id="path504" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath534" clipPathUnits="userSpaceOnUse">
                            <path id="path532"
                                d="m 31.254,356.175 c 1.124,-5.972 18.797,-11.993 18.797,-11.993 v 0 c 0.203,0.409 0.477,1.07 0.772,1.842 v 0 c -2.554,0.725 -6.541,2.727 -8.179,3.575 v 0 c 2.198,-1.045 6.302,-2.294 8.431,-2.911 v 0 c 0.923,2.48 1.961,5.62 1.961,5.62 v 0 c -5.287,-1.03 -7.931,3.426 -7.931,3.426 v 0 c -8.418,-1.958 -10.915,0.636 -12.481,1.615 v 0 c -0.291,0.182 -0.521,0.256 -0.702,0.256 v 0 c -0.799,-0.001 -0.668,-1.43 -0.668,-1.43" />
                        </clipPath>
                        <linearGradient id="linearGradient546" spreadMethod="pad"
                            gradientTransform="matrix(21.790039,0,0,-21.790039,59.657463,322.70601)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop540" offset="0" style="stop-opacity:1;stop-color:#0f5184" />
                            <stop id="stop542" offset="0.81173443" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop544" offset="1" style="stop-opacity:1;stop-color:#1b75bb" />
                        </linearGradient>
                        <clipPath id="clipPath556" clipPathUnits="userSpaceOnUse">
                            <path id="path554"
                                d="m 42.602,349.62 c -0.338,0.177 -0.571,0.298 -0.66,0.348 v 0 c 0.19,-0.115 0.415,-0.231 0.66,-0.348" />
                        </clipPath>
                        <linearGradient id="linearGradient568" spreadMethod="pad"
                            gradientTransform="matrix(0.6606445,0,0,-0.6606445,70.353262,321.60689)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop562" offset="0" style="stop-opacity:1;stop-color:#0f5184" />
                            <stop id="stop564" offset="0.81173443" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop566" offset="1" style="stop-opacity:1;stop-color:#1b75bb" />
                        </linearGradient>
                        <clipPath id="clipPath3432" clipPathUnits="userSpaceOnUse">
                            <path id="path3430"
                                d="m 443.023,185.54 3.691,-4.5 c 0,0 1.208,-5.706 1.948,-6.243 v 0 c 0,0 -0.559,-10.057 0.177,-15.016 v 0 c 0,-0.004 0.005,-0.007 0.005,-0.007 v 0 c 0.108,-0.739 0.25,-1.362 0.422,-1.825 v 0 c 0,0 0.101,-0.197 0.274,-0.54 v 0 c 1.12,-2.223 5.343,-10.641 5.631,-11.745 v 0 l 0.339,-1.276 c 0,0 -1.881,-9.131 2.618,-12.216 v 0 c 0,0 4.967,5.639 5.703,6.243 v 0 6.645 c 0,0 -1.334,2.843 -3.138,6.308 v 0 c -0.007,0.011 -0.007,0.015 -0.007,0.015 v 0 c -1.294,2.486 -2.832,5.293 -4.291,7.597 v 0 c -0.092,0.15 -0.188,0.298 -0.281,0.444 v 0 c 0,0 0.201,2.213 -0.338,3.894 v 0 c -0.536,1.68 -5.034,11.077 -4.363,12.487 v 0 l 2.015,3.354 v 3.561 c 0,0 -1.342,-1.479 -1.209,-2.554 v 0 l -0.806,-1.007 -0.334,4.632 -6.109,4.769 z" />
                        </clipPath>
                        <linearGradient id="linearGradient3442" spreadMethod="pad"
                            gradientTransform="matrix(21.98735,-42.113762,-42.113762,-21.98735,837.10728,-127.27217)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3438" offset="0" style="stop-opacity:1;stop-color:#8b5a24" />
                            <stop id="stop3440" offset="1" style="stop-opacity:1;stop-color:#8a4422" />
                        </linearGradient>
                        <clipPath id="clipPath3452" clipPathUnits="userSpaceOnUse">
                            <path id="path3450"
                                d="m 443.065,158.352 c -0.018,-0.066 -0.029,-0.133 -0.042,-0.201 v 0 l 0.42,-1.128 c 0,0 -1.641,-0.225 -1.641,-2.256 v 0 -8.467 c 0,0 0.098,-0.096 0.279,-0.233 v 0 c 0.464,-0.367 1.474,-1.007 2.772,-1.007 v 0 c 1.803,0 5.802,1.24 8.575,3.553 v 0 c 0,0 -4.592,7.571 -4.794,8.972 v 0 c -0.37,2.575 -0.733,4.517 -0.733,4.517 v 0 c 0,0 -4.165,-0.54 -4.836,-3.75" />
                        </clipPath>
                        <linearGradient id="linearGradient3462" spreadMethod="pad"
                            gradientTransform="matrix(11.625977,0,0,-11.625977,835.77427,-154.65792)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3458" offset="0" style="stop-opacity:1;stop-color:#8b5a24" />
                            <stop id="stop3460" offset="1" style="stop-opacity:1;stop-color:#8a4422" />
                        </linearGradient>
                        <clipPath id="clipPath3472" clipPathUnits="userSpaceOnUse">
                            <path id="path3470"
                                d="m 446.983,174.865 c -0.06,-0.055 -0.124,-0.112 -0.189,-0.169 v 0 c -1.117,-0.957 -2.819,-1.804 -3.771,-2.247 v 0 c -1.006,-0.472 -1.221,-1.209 -1.221,-1.209 v 0 l -2.673,-0.74 -0.269,-2.015 c -7.183,-2.819 -18.73,-12.486 -18.73,-12.486 v 0 c 0.085,-0.205 0.182,-0.418 0.294,-0.645 v 0 c 2.613,-5.316 12.261,-15.397 12.261,-15.397 v 0 c 4.833,1.478 6.311,6.312 6.311,6.312 v 0 c -1.95,0.938 -4.164,0.668 -4.164,0.668 v 0 c 0,0 -2.481,2.887 -3.086,4.097 v 0 c -0.605,1.207 -3.223,2.545 -3.223,2.545 v 0 c 0,0 11.142,12.49 12.487,13.698 v 0 c 1.341,1.208 5.098,2.151 5.098,2.151 v 0 l 2.082,1.272 v 2.014 c -1.005,-0.937 -2.283,-1.409 -2.283,-1.409 v 0 c 0.271,0.874 2.283,3.56 2.283,3.56 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient3482" spreadMethod="pad"
                            gradientTransform="matrix(-17.434767,-21.987194,-21.987194,17.434767,840.10142,-136.68428)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3478" offset="0" style="stop-opacity:1;stop-color:#8b5a24" />
                            <stop id="stop3480" offset="1" style="stop-opacity:1;stop-color:#8a4422" />
                        </linearGradient>
                        <clipPath id="clipPath3492" clipPathUnits="userSpaceOnUse">
                            <path id="path3490"
                                d="m 440.337,145.999 c -0.069,-0.238 -0.145,-0.472 -0.237,-0.699 v 0 c -1.794,-4.61 -7.415,-6.35 -7.415,-6.35 v 0 c -0.102,-5.236 -7.049,-21.447 -7.049,-21.447 v 0 l 1.31,-1.512 c 0.736,-0.602 3.08,-1.559 5.874,-2.56 v 0 c 3.575,-1.277 7.879,-2.639 10.514,-3.448 v 0 l 2.174,3.987 c 1.201,8.72 6.517,15.692 10.11,19.517 v 0 c -2.166,4.505 -0.982,11.573 -0.982,11.573 v 0 l -0.706,1.543 c -8.659,-5.137 -13.593,-0.604 -13.593,-0.604" />
                        </clipPath>
                        <linearGradient id="linearGradient3502" spreadMethod="pad"
                            gradientTransform="matrix(29.982422,0,0,-29.982422,819.60825,-179.946)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3498" offset="0" style="stop-opacity:1;stop-color:#ec1c24" />
                            <stop id="stop3500" offset="1" style="stop-opacity:1;stop-color:#be1e2d" />
                        </linearGradient>
                        <clipPath id="clipPath3512" clipPathUnits="userSpaceOnUse">
                            <path id="path3510" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath3524" clipPathUnits="userSpaceOnUse">
                            <path id="path3522"
                                d="m 413.553,85.583 c 2.444,-2.807 8.304,-3.597 11.865,-3.818 v 0 c 1.719,-0.104 2.905,-0.077 2.905,-0.077 v 0 c -1.077,5.909 3.221,12.352 3.221,12.352 v 0 c 2.417,-4.43 0.133,-12.216 0.133,-12.216 v 0 c 2.268,-1.889 8.108,-3.448 11.569,-3.197 v 0 c 2.085,12.748 -1.192,28.477 -1.229,28.658 v 0 l -0.04,0.213 0.817,1.501 c -4.072,0.657 -8.124,2.091 -11.269,3.42 v 0 l -0.005,0.004 c -3.507,1.479 -5.884,2.832 -5.884,2.832 v 0 c -6.312,-9.533 -12.083,-29.672 -12.083,-29.672" />
                        </clipPath>
                        <linearGradient id="linearGradient3534" spreadMethod="pad"
                            gradientTransform="matrix(30.386719,0,0,-30.386719,807.52524,-211.31123)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3530" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop3532" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath3544" clipPathUnits="userSpaceOnUse">
                            <path id="path3542"
                                d="m 443.246,107.3 c 0.386,-2.086 3.033,-16.441 0.999,-28.701 v 0 c 0.689,-0.114 1.104,-0.174 1.104,-0.174 v 0 c 2.145,9.805 0.022,30.265 0.022,30.265 v 0 c -0.43,0.032 -0.861,0.072 -1.296,0.129 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient3554" spreadMethod="pad"
                            gradientTransform="matrix(3.0615234,0,0,-3.0615234,837.2186,-214.6169)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3550" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop3552" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath3564" clipPathUnits="userSpaceOnUse">
                            <path id="path3562" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath3572" clipPathUnits="userSpaceOnUse">
                            <path id="path3570" d="m 449.54,158.98 h 14.291 V 132.172 H 449.54 Z" />
                        </clipPath>
                        <clipPath id="clipPath3588" clipPathUnits="userSpaceOnUse">
                            <path id="path3586" d="M 420.424,174.865 H 448.19 V 139.957 H 420.424 Z" />
                        </clipPath>
                        <clipPath id="clipPath3604" clipPathUnits="userSpaceOnUse">
                            <path id="path3602"
                                d="m 414.913,77.024 c -1.935,-5.236 -7.805,-25.677 -7.805,-25.677 v 0 c 0.621,-0.205 1.358,-0.214 2.01,-0.145 v 0 c 0.938,0.091 1.707,0.334 1.707,0.334 v 0 c 0,0 9.072,18.237 9.777,20.05 v 0 c 0.704,1.813 -0.605,4.833 -0.605,4.833 v 0 l 2.719,4.833 c -3.621,-0.137 -6.982,1.572 -7.235,1.705 v 0 c -0.01,0.004 -0.016,0.007 -0.016,0.007 v 0 c -1.409,-2.92 -0.552,-5.94 -0.552,-5.94" />
                        </clipPath>
                        <linearGradient id="linearGradient3614" spreadMethod="pad"
                            gradientTransform="matrix(13.472012,36.583157,36.583157,-13.472012,802.20396,-257.52998)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3610" offset="0" style="stop-opacity:1;stop-color:#8a4422" />
                            <stop id="stop3612" offset="1" style="stop-opacity:1;stop-color:#8b5a24" />
                        </linearGradient>
                        <clipPath id="clipPath3624" clipPathUnits="userSpaceOnUse">
                            <path id="path3622"
                                d="m 437.618,71.788 c -0.112,-0.125 -0.221,-0.263 -0.317,-0.405 v 0 c -1.572,-2.234 -1.394,-6.243 -1.394,-6.243 v 0 l 2.339,-22.344 c 0.562,-0.363 0.814,-0.984 1.854,-1.121 v 0 c 1.12,-0.144 1.969,0.178 1.969,0.178 v 0 c 0,0 2.498,20.267 2.715,22.483 v 0 c 0.222,2.215 -2.333,8.357 -2.333,8.357 v 0 c 0.705,1.209 0.795,4.966 0.795,4.966 v 0 c -0.388,-0.059 -0.766,-0.096 -1.133,-0.113 v 0 c -3.874,-0.2 -6.71,1.593 -6.71,1.593 v 0 c 0,-2.418 2.215,-7.351 2.215,-7.351" />
                        </clipPath>
                        <linearGradient id="linearGradient3634" spreadMethod="pad"
                            gradientTransform="matrix(-4.0441523,38.633148,38.633148,4.0441523,835.64438,-255.83076)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3630" offset="0" style="stop-opacity:1;stop-color:#8a4422" />
                            <stop id="stop3632" offset="1" style="stop-opacity:1;stop-color:#8b5a24" />
                        </linearGradient>
                        <clipPath id="clipPath3660" clipPathUnits="userSpaceOnUse">
                            <path id="path3658" d="m 432.82,146.603 h 22.798 V 109.982 H 432.82 Z" />
                        </clipPath>
                        <clipPath id="clipPath3676" clipPathUnits="userSpaceOnUse">
                            <path id="path3674" d="m 444.51,132.372 h 12.691 V 109.245 H 444.51 Z" />
                        </clipPath>
                        <clipPath id="clipPath3696" clipPathUnits="userSpaceOnUse">
                            <path id="path3694" d="m 435.901,77.6592 h 8.897 V 41.6377 h -8.897 z" />
                        </clipPath>
                        <clipPath id="clipPath3712" clipPathUnits="userSpaceOnUse">
                            <path id="path3710" d="m 409.118,82.957 h 13.598 V 51.2021 h -13.598 z" />
                        </clipPath>
                        <clipPath id="clipPath3728" clipPathUnits="userSpaceOnUse">
                            <path id="path3726" d="m 441.802,158.353 h 3.184 v -12.286 h -3.184 z" />
                        </clipPath>
                        <clipPath id="clipPath3744" clipPathUnits="userSpaceOnUse">
                            <path id="path3742" d="m 445.832,157.732 h 3.628 v -2.958 h -3.628 z" />
                        </clipPath>
                        <clipPath id="clipPath3760" clipPathUnits="userSpaceOnUse">
                            <path id="path3758" d="m 423.795,112.419 h 20.144 V 78.6006 h -20.144 z" />
                        </clipPath>
                        <clipPath id="clipPath3776" clipPathUnits="userSpaceOnUse">
                            <path id="path3774" d="m 443.246,108.819 h 3.062 V 78.4248 h -3.062 z" />
                        </clipPath>
                        <clipPath id="clipPath1704" clipPathUnits="userSpaceOnUse">
                            <path id="path1702"
                                d="m 283.453,323.839 c -1.297,-0.365 -2.459,-1.048 -3.397,-1.959 v 0 c -0.93,-0.897 -1.641,-2.015 -2.047,-3.273 v 0 c -0.257,-0.781 -0.395,-1.614 -0.395,-2.481 v 0 c 0,-1.307 0.315,-2.543 0.87,-3.633 v 0 c 0.036,-0.074 0.079,-0.148 0.117,-0.221 v 0 c 1.363,-2.48 4.001,-4.159 7.027,-4.159 v 0 c 1.426,0 2.77,0.372 3.932,1.026 v 0 c 1.436,0.811 2.598,2.05 3.309,3.546 v 0 c 0.499,1.042 0.776,2.21 0.776,3.441 v 0 c 0,4.107 -3.089,7.493 -7.073,7.959 v 0 c -0.309,0.037 -0.625,0.054 -0.944,0.054 v 0 c -0.752,0 -1.483,-0.103 -2.175,-0.3" />
                        </clipPath>
                        <radialGradient id="radialGradient1716" spreadMethod="pad"
                            gradientTransform="matrix(-8.0141602,0,0,-8.0141602,488.44226,143.10051)"
                            gradientUnits="userSpaceOnUse" r="1" cy="0" cx="0"
                            fy="0" fx="0">
                            <stop id="stop1710" offset="0" style="stop-opacity:1;stop-color:#f1f1f2" />
                            <stop id="stop1712" offset="0.45016275" style="stop-opacity:1;stop-color:#f1f1f2" />
                            <stop id="stop1714" offset="1" style="stop-opacity:1;stop-color:#d0d2d3" />
                        </radialGradient>
                        <clipPath id="clipPath1726" clipPathUnits="userSpaceOnUse">
                            <path id="path1724" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1762" clipPathUnits="userSpaceOnUse">
                            <path id="path1760" d="m 280.056,324.14 h 13.589 v -11.455 h -13.589 z" />
                        </clipPath>
                        <clipPath id="clipPath1778" clipPathUnits="userSpaceOnUse">
                            <path id="path1776"
                                d="m 249.898,313.252 c -0.707,-0.24 -1.325,-0.566 -1.76,-1.001 v 0 l -0.549,-2.939 0.684,-0.824 -0.684,-1.161 v -8.344 c 0,0 8.688,0.82 10.261,2.051 v 0 l 0.616,2.259 c 0,0 2.051,0.068 2.393,1.092 v 0 c 0.341,1.027 0.82,3.969 -2.257,3.079 v 0 c 0,0 0.275,2.464 -2.256,3.148 v 0 c 0,0 1.437,1.572 0,3.282 v 0 c 0,0 -0.501,0.033 -1.264,0.033 v 0 c -1.346,0 -3.51,-0.103 -5.184,-0.675" />
                        </clipPath>
                        <linearGradient id="linearGradient1790" spreadMethod="pad"
                            gradientTransform="matrix(-13.519531,0,0,-13.519531,463.92272,133.42961)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1784" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1786" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1788" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath1800" clipPathUnits="userSpaceOnUse">
                            <path id="path1798" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1816" clipPathUnits="userSpaceOnUse">
                            <path id="path1814"
                                d="m 250.897,292.286 -3.308,2.587 c 0,0 -3.467,-0.796 -6.794,1.82 v 0 l -10.227,-5.147 0.304,-1.293 0.975,-4.177 0.447,-1.923 3.574,1.11 4.927,4.928 -2.885,-3.672 -1.18,-1.502 c 0,0 0.033,-0.062 0.099,-0.173 v 0 c 0.501,-0.877 2.845,-4.797 4.706,-5.126 v 0 c 0,0 -1.602,-0.367 -2.959,1.356 v 0 l -0.369,-5.297 c 0,0 5.79,-9.486 5.421,-16.262 v 0 c 0,0 6.224,6.671 14.869,8.435 v 0 c 2.436,0.5 5.065,0.605 7.8,0.065 v 0 c 0,0 -4.116,5.289 -9.634,6.531 v 0 l 7.538,11.825 7.639,-0.367 0.929,2.284 1.411,3.475 1.111,2.74 -9.733,2.958 c 0,0 -8.01,-2.958 -14.661,-5.175" />
                        </clipPath>
                        <linearGradient id="linearGradient1828" spreadMethod="pad"
                            gradientTransform="matrix(-44.722656,0,0,-44.722656,478.10437,105.46232)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1822" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop1824" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop1826" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath1838" clipPathUnits="userSpaceOnUse">
                            <path id="path1836"
                                d="m 280.904,308.011 1.881,-0.999 -2.801,-14.589 -4.148,0.609 -2.136,-4.683 -0.627,-1.378 c 0,0 9.98,-1.33 12.819,0.565 v 0 l 0.387,19.39 v 0.011 c 0,0 4.375,1.074 6.216,3.992 v 0 0.997 c 0,0 -3.453,-3.456 -5.911,-3.456 v 0 c -2.456,0 -3.299,0.316 -3.299,0.316 v 0 c 0,0 -1.077,3.869 -3.918,3.926 v 0 c 0,0 2.072,-2.703 1.537,-4.701" />
                        </clipPath>
                        <linearGradient id="linearGradient1850" spreadMethod="pad"
                            gradientTransform="matrix(-19.422852,0,0,-19.422852,495.30847,126.58928)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1844" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1846" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1848" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath1860" clipPathUnits="userSpaceOnUse">
                            <path id="path1858" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1876" clipPathUnits="userSpaceOnUse">
                            <path id="path1874"
                                d="m 259.377,266.413 c -3.23,-0.641 -7.531,-2.137 -12.463,-5.45 v 0 c -0.735,-0.493 -1.485,-1.027 -2.248,-1.606 v 0 c 0,0 -6.831,-7.247 -7.783,-10.901 v 0 c 0,0 5.5,0.221 10.282,-1.545 v 0 c 0.958,-0.352 1.884,-0.785 2.733,-1.315 v 0 l 5.091,7.783 c 0,0 5.475,-1.112 8.696,-3.811 v 0 c 0,0 0.715,1.406 2.222,3.083 v 0 c 1.581,1.759 4.029,3.816 7.426,4.866 v 0 c 0.865,0.27 1.791,0.471 2.782,0.585 v 0 c 0,0 -7.486,8.508 -10.481,8.618 v 0 c 0,0 -0.385,0.079 -1.099,0.117 v 0 c -0.253,0.015 -0.549,0.025 -0.884,0.025 v 0 c -1.056,0 -2.505,-0.097 -4.274,-0.449" />
                        </clipPath>
                        <linearGradient id="linearGradient1888" spreadMethod="pad"
                            gradientTransform="matrix(-39.232422,0,0,-39.232422,478.92858,83.203531)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1882" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop1884" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop1886" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath1898" clipPathUnits="userSpaceOnUse">
                            <path id="path1896" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1914" clipPathUnits="userSpaceOnUse">
                            <path id="path1912"
                                d="m 224.02,287.536 c -2.328,-1.727 -8.627,-9.401 -8.627,-9.401 v 0 l -3.882,1.896 c -1.896,0.174 -5.863,-3.363 -5.863,-3.363 v 0 l 3.708,-3.488 c 0.776,0.91 4.14,1.676 5.001,1.676 v 0 c 0.865,0 0,-2.329 0,-3.19 v 0 c 0,-0.326 0.112,-0.606 0.249,-0.823 v 0 c 0.228,-0.36 0.528,-0.56 0.528,-0.56 v 0 c 0.174,1.813 3.364,4.23 3.364,4.23 v 0 c -0.344,1.205 -1.294,1.552 -1.294,1.552 v 0 l 11.127,7.33 3.278,0.861 -0.522,1.765 -1.116,3.757 z" />
                        </clipPath>
                        <linearGradient id="linearGradient1926" spreadMethod="pad"
                            gradientTransform="matrix(-25.960937,0,0,-25.960937,434.42272,107.00578)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1920" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1922" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1924" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath1936" clipPathUnits="userSpaceOnUse">
                            <path id="path1934" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1952" clipPathUnits="userSpaceOnUse">
                            <path id="path1950"
                                d="m 237.698,247.372 c 0,0 -3.279,-10.675 -2.101,-16.643 v 0 c 0,0 3.699,-1.933 4.96,-3.448 v 0 c 0,0 3.652,0.05 5.398,3.145 v 0 c 0.595,1.052 0.97,2.461 0.905,4.335 v 0 l -1.934,1.178 -1.849,-1.678 6.137,10.674 c 0,0 -1.05,0.492 -2.584,1.055 v 0 c -1.997,0.728 -4.815,1.566 -7.196,1.566 v 0 c -0.615,0 -1.201,-0.056 -1.736,-0.184" />
                        </clipPath>
                        <linearGradient id="linearGradient1964" spreadMethod="pad"
                            gradientTransform="matrix(-13.87207,0,0,-13.87207,452.02722,64.393481)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1958" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1960" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1962" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath1974" clipPathUnits="userSpaceOnUse">
                            <path id="path1972"
                                d="m 266.52,252.288 c -0.538,-0.593 -1.022,-1.25 -1.42,-1.975 v 0 l 7.48,-4.717 c 0,0 0.366,0.748 1.095,1.748 v 0 c 1.058,1.45 2.878,3.44 5.462,4.483 v 0 l -3.846,5.38 c 0,0 -5.436,-1.248 -8.771,-4.919" />
                        </clipPath>
                        <linearGradient id="linearGradient1986" spreadMethod="pad"
                            gradientTransform="matrix(-14.036133,0,0,-14.036133,481.95007,78.376871)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1980" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1982" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop1984" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath1996" clipPathUnits="userSpaceOnUse">
                            <path id="path1994"
                                d="m 261.478,288.157 c -0.004,0.002 -0.008,0.007 -0.014,0.011 v 0 c -0.222,0.268 -2.706,2.131 -2.813,2.211 v 0 c 0.073,-0.134 2.43,-4.409 2.459,-6.596 v 0 c 0,0 -4.085,-4.011 -7.674,-4.527 v 0 c 0,0 -2.69,2.587 -4.883,2.458 v 0 c 0,0 4.403,-3.753 4.273,-4.27 v 0 l -3.873,0.517 c 0,0 2.579,-3.483 6.461,-4.781 v 0 l -5.516,1.676 c 0,0 6.464,-4.613 8.599,-6.906 v 0 c 2.436,0.5 5.065,0.605 7.8,0.065 v 0 c 0,0 -4.116,5.289 -9.634,6.531 v 0 l 7.538,11.825 7.639,-0.367 0.929,2.284 c -3.918,0.202 -9.084,0.735 -12.955,2.093 v 0 c 0,0 1.565,-2.072 1.664,-2.224" />
                        </clipPath>
                        <linearGradient id="linearGradient2008" spreadMethod="pad"
                            gradientTransform="matrix(-24.216797,0,0,-24.216797,475.58288,106.14006)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2002" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2004" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2006" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2018" clipPathUnits="userSpaceOnUse">
                            <path id="path2016" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2026" clipPathUnits="userSpaceOnUse">
                            <path id="path2024" d="m 230.568,297.46 h 44.723 v -7.682 h -44.723 z" />
                        </clipPath>
                        <clipPath id="clipPath2042" clipPathUnits="userSpaceOnUse">
                            <path id="path2040"
                                d="m 283.588,289.229 c 0,0 -1.902,-0.846 -9.888,-0.88 v 0 l -0.627,-1.378 c 0,0 9.98,-1.33 12.819,0.565 v 0 l 0.387,19.39 c -0.67,-0.051 -1.344,-0.02 -1.971,0.137 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2054" spreadMethod="pad"
                            gradientTransform="matrix(-13.207031,0,0,-13.207031,499.27038,123.76457)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2048" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2050" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2052" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2064" clipPathUnits="userSpaceOnUse">
                            <path id="path2062" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2088" clipPathUnits="userSpaceOnUse">
                            <path id="path2086" d="m 231.847,286.457 h 5.214 v -2.304 h -5.214 z" />
                        </clipPath>
                        <clipPath id="clipPath2104" clipPathUnits="userSpaceOnUse">
                            <path id="path2102"
                                d="m 230.568,285.982 -2.84,-1.034 -10.824,-7.363 -0.929,-1.239 c 0,0 1.464,-1.423 0.756,-1.997 v 0 c -0.494,-0.401 -1.674,-1.897 -2.125,-3.506 v 0 c 0.228,-0.36 0.528,-0.56 0.528,-0.56 v 0 c 0.174,1.813 3.364,4.23 3.364,4.23 v 0 c -0.344,1.205 -1.294,1.552 -1.294,1.552 v 0 l 11.127,7.33 3.278,0.861 -0.522,1.765 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2116" spreadMethod="pad"
                            gradientTransform="matrix(-17.003906,0,0,-17.003906,443.97448,105.12687)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2110" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2112" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2114" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2126" clipPathUnits="userSpaceOnUse">
                            <path id="path2124" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2146" clipPathUnits="userSpaceOnUse">
                            <path id="path2144"
                                d="m 265.1,250.313 7.48,-4.717 c 0,0 0.366,0.748 1.095,1.748 v 0 c -2.003,1.564 -4.479,3.35 -7.155,4.944 v 0 c -0.538,-0.593 -1.022,-1.25 -1.42,-1.975" />
                        </clipPath>
                        <linearGradient id="linearGradient2158" spreadMethod="pad"
                            gradientTransform="matrix(5.4457579,6.6204877,-6.6204877,5.4457579,466.34948,68.617111)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2152" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2154" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2156" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2168" clipPathUnits="userSpaceOnUse">
                            <path id="path2166"
                                d="m 245.897,255.542 h 6.929 c 0,0 -2.793,-3.773 -5.661,-8.631 v 0 c 0.958,-0.352 1.884,-0.785 2.733,-1.315 v 0 l 5.091,7.783 c 0,0 5.475,-1.112 8.696,-3.811 v 0 c 0,0 0.715,1.406 2.222,3.083 v 0 c -3.45,1.993 -7.19,3.629 -10.654,4.049 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2180" spreadMethod="pad"
                            gradientTransform="matrix(-20.010742,0,0,-20.010742,476.61315,78.122971)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2174" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2176" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2178" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2190" clipPathUnits="userSpaceOnUse">
                            <path id="path2188"
                                d="m 241.216,233.073 c 0,0 2.298,0 4.739,-2.647 v 0 c 0.595,1.052 0.97,2.461 0.905,4.335 v 0 l -1.934,1.178 -1.849,-1.678 6.137,10.674 c 0,0 -1.05,0.492 -2.584,1.055 v 0 c -2.412,-4.192 -4.757,-9.034 -5.414,-12.917" />
                        </clipPath>
                        <linearGradient id="linearGradient2202" spreadMethod="pad"
                            gradientTransform="matrix(-7.9970703,0,0,-7.9970703,458.47839,65.182541)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2196" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2198" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2200" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2244" clipPathUnits="userSpaceOnUse">
                            <path id="path2242" d="m 246.914,266.861 h 29.201 v -9.344 h -29.201 z" />
                        </clipPath>
                        <clipPath id="clipPath2944" clipPathUnits="userSpaceOnUse">
                            <path id="path2942" d="M 35.0562,125.455 H 60.9106 V 102.729 H 35.0562 Z" />
                        </clipPath>
                        <clipPath id="clipPath2960" clipPathUnits="userSpaceOnUse">
                            <path id="path2958"
                                d="m 106.996,93.577 c 4.268,-3.953 10.172,-5.043 10.172,-5.043 v 0 c 0.041,0.076 0.084,0.148 0.12,0.222 v 0 c 1.091,2.02 1.588,3.716 2.333,5.271 v 0 c 2.725,5.679 1.028,8.47 0.726,9.403 v 0 c -0.407,1.272 0.865,1.272 0.865,1.272 v 0 c -0.639,1.998 -1.816,3.044 -1.816,3.044 v 0 c -0.604,0.218 -1.177,0.39 -1.723,0.517 v 0 c -0.883,0.207 -1.691,0.302 -2.436,0.302 v 0 c -9.308,-0.002 -8.241,-14.988 -8.241,-14.988" />
                        </clipPath>
                        <linearGradient id="linearGradient2972" spreadMethod="pad"
                            gradientTransform="matrix(14.254395,0,0,-14.254395,139.17976,-269.48399)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2966" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2968" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2970" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2982" clipPathUnits="userSpaceOnUse">
                            <path id="path2980" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2994" clipPathUnits="userSpaceOnUse">
                            <path id="path2992"
                                d="m 119.864,105.61 c 0,0 -2.725,0.061 -2.486,-1.879 v 0 c 0.245,-1.936 1.454,-3.45 1.454,-3.45 v 0 l -1.635,-0.91 c 0,0 0.789,-0.436 0.726,-0.823 v 0 c -0.057,-0.387 -3.2,0.279 -3.839,-1.415 v 0 c 0,0 3.237,0.604 3.72,-0.544 v 0 c 0,0 -0.665,-1.091 -1.452,-1.091 v 0 c 0,0 1.357,-3.821 0.936,-6.742 v 0 c 1.091,2.02 1.588,3.716 2.333,5.271 v 0 c 2.725,5.679 1.028,8.47 0.726,9.403 v 0 c -0.407,1.272 0.865,1.272 0.865,1.272 v 0 c -0.639,1.998 -1.816,3.044 -1.816,3.044 v 0 c -0.604,0.218 -1.177,0.39 -1.723,0.517 v 0 c 0.785,-0.611 1.926,-1.639 2.191,-2.653" />
                        </clipPath>
                        <linearGradient id="linearGradient3006" spreadMethod="pad"
                            gradientTransform="matrix(7.128418,0,0,-7.128418,125.65192,-269.52403)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3000" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3002" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3004" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3016" clipPathUnits="userSpaceOnUse">
                            <path id="path3014"
                                d="m 110.84,105.005 c 0,0 0.121,-1.515 2.301,-3.331 v 0 c 0,0 3.816,2.725 3.513,3.573 v 0 c -0.166,0.467 -1.495,0.935 -2.887,0.935 v 0 c -1.13,0 -2.302,-0.309 -2.927,-1.177" />
                        </clipPath>
                        <linearGradient id="linearGradient3028" spreadMethod="pad"
                            gradientTransform="matrix(5.8305664,0,0,-5.8305664,120.19392,-264.10606)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3022" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3024" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3026" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3038" clipPathUnits="userSpaceOnUse">
                            <path id="path3036" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath3070" clipPathUnits="userSpaceOnUse">
                            <path id="path3068"
                                d="m 57.477,121.756 c -0.566,-2.857 2.482,-5.57 2.482,-5.57 v 0 c 0,0 -0.455,-3.098 -1.184,-4.555 v 0 c -0.731,-1.462 0.711,-3.368 0.711,-3.368 v 0 C 56.914,99.702 55.857,74.727 55.857,74.727 v 0 c 5.922,-2.913 28.067,-9.669 28.067,-9.669 v 0 c 0.454,-2.652 4.556,-11.93 7.561,-14.572 v 0 c 3.009,-2.642 5.467,-7.289 5.467,-7.289 v 0 c 0,0 5.923,4.647 10.025,3.644 v 0 c 4.102,-1.002 3.736,-4.284 3.736,-4.284 v 0 c 0,0 2.187,2.097 4.736,2.461 v 0 c 2.555,0.365 3.373,-1.392 3.373,-1.392 v 0 c 1.732,1.886 5.34,1.853 5.34,1.853 v 0 l 9.447,22.89 c 23.616,2.906 41.601,-8.081 41.601,-8.081 v 0 c 0,0 0.181,-1.911 0.181,-2.467 v 0 c 0,-0.556 5.087,-3.985 5.087,-3.985 v 0 c 0.185,0.308 0.243,0.65 0.214,1.002 v 0 0.004 c -0.145,1.737 -2.394,3.783 -2.394,3.783 v 0 c 0.981,0.501 1.93,0.734 2.831,0.773 v 0 c 4.104,0.19 7.161,-3.564 7.161,-3.564 v 0 l 3.633,4.454 c -1.635,3.546 -7.266,5.72 -7.266,5.72 v 0 l -0.092,-0.03 -5.904,-1.803 c -0.196,0.259 -0.392,0.511 -0.588,0.756 v 0 c -11.812,14.938 -24.118,11.976 -24.118,11.976 v 0 c -5.268,4.542 -13.987,3.09 -13.987,3.09 v 0 c -6.116,8.926 -12.535,5.364 -13.64,4.656 v 0 c -0.109,-0.073 -0.167,-0.116 -0.167,-0.116 v 0 h -7.449 c -0.308,0 -0.552,0.113 -0.745,0.291 v 0 c -0.82,0.771 -0.686,2.797 -0.686,2.797 v 0 c -4.156,0 -11.096,4.869 -11.096,4.869 v 0 c -0.025,-0.717 -0.109,-1.411 -0.243,-2.071 v 0 c -0.905,-4.741 -4.044,-8.023 -4.763,-8.724 v 0 c -0.095,-0.092 -0.15,-0.141 -0.15,-0.141 v 0 C 90.617,88.028 83.742,80.192 83.742,80.192 v 0 c -9.566,6.652 -16.218,2.645 -16.218,2.645 v 0 C 67,87.481 65.372,95.204 64.079,100.963 v 0 c -0.966,4.297 -1.751,7.499 -1.751,7.499 v 0 c 0.458,2.757 -0.731,9.544 -0.731,9.544 v 0 L 57.59,122.2 c -0.051,-0.149 -0.087,-0.299 -0.113,-0.444" />
                        </clipPath>
                        <linearGradient id="linearGradient3082" spreadMethod="pad"
                            gradientTransform="matrix(136.06592,0,0,-136.06592,88.078693,-285.65489)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3076" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3078" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3080" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3092" clipPathUnits="userSpaceOnUse">
                            <path id="path3090"
                                d="m 105.942,90.423 c 1.38,-2.315 4.247,-5.814 9.864,-8.55 v 0 c 0,0 1.147,0.531 2.161,2.955 v 0 c -0.82,0.771 -0.686,2.797 -0.686,2.797 v 0 c -4.156,0 -11.096,4.869 -11.096,4.869 v 0 c -0.025,-0.717 -0.109,-1.411 -0.243,-2.071" />
                        </clipPath>
                        <linearGradient id="linearGradient3104" spreadMethod="pad"
                            gradientTransform="matrix(9.8672333,6.7564135,6.7564135,-9.8672333,137.03181,-285.09141)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3098" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3100" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3102" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3114" clipPathUnits="userSpaceOnUse">
                            <path id="path3112"
                                d="m 59.959,116.186 c 0,0 -0.455,-3.098 -1.184,-4.555 v 0 c -0.731,-1.462 0.711,-3.368 0.711,-3.368 v 0 C 56.914,99.702 55.857,74.727 55.857,74.727 v 0 c 5.922,-2.913 28.067,-9.669 28.067,-9.669 v 0 c 0.454,-2.652 4.556,-11.93 7.561,-14.572 v 0 c 3.009,-2.642 5.467,-7.289 5.467,-7.289 v 0 c 0,0 5.923,4.647 10.025,3.644 v 0 c 4.102,-1.002 3.736,-4.284 3.736,-4.284 v 0 c 0,0 2.187,2.097 4.736,2.461 v 0 c 2.555,0.365 3.373,-1.392 3.373,-1.392 v 0 c 1.732,1.886 5.34,1.853 5.34,1.853 v 0 l 9.447,22.89 c 23.616,2.906 41.601,-8.081 41.601,-8.081 v 0 c 0,0 0.181,-1.911 0.181,-2.467 v 0 c 0,-0.556 5.087,-3.985 5.087,-3.985 v 0 c 0.185,0.308 0.243,0.65 0.214,1.002 v 0 0.004 c -1.373,1.737 -4.203,2.979 -4.203,2.979 v 0 3.891 c -6.532,9.051 -24.288,10.999 -24.288,10.999 v 0 c -10.424,-1.602 -15.805,1.032 -15.805,1.032 v 0 c -0.222,2.114 1.173,4.225 1.253,4.348 v 0 C 133.961,76.038 134.103,71.795 131.01,67.9 v 0 c -3.094,-3.895 -4.925,-5.384 -16.138,-6.874 v 0 C 103.66,59.537 94.468,60.222 92.521,65.058 v 0 c -1.949,4.838 -6.759,8.913 -6.759,8.913 v 0 l 1.719,-2.522 C 69.837,70.875 58.498,77.521 58.498,77.521 v 0 l 1.947,30.742 c -1.606,2.332 -0.032,7.908 -0.032,7.908 v 0 c 0,0 -2.02,2.46 -2.936,5.585 v 0 c -0.566,-2.857 2.482,-5.57 2.482,-5.57" />
                        </clipPath>
                        <linearGradient id="linearGradient3126" spreadMethod="pad"
                            gradientTransform="matrix(7.9445648,140.96007,140.96007,-7.9445648,143.03669,-426.34922)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3120" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3122" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3124" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3136" clipPathUnits="userSpaceOnUse">
                            <path id="path3134" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath3152" clipPathUnits="userSpaceOnUse">
                            <path id="path3150"
                                d="m 184.565,65.978 c -0.144,-0.273 -0.196,-0.614 -0.072,-1.036 v 0 c 0,0 -1.492,-0.236 -0.955,-1.613 v 0 c 0,0 -1.676,0.059 -0.956,-1.377 v 0 c 0,0 -2.162,-0.541 -1.453,-2.554 v 0 c 4.104,0.19 7.161,-3.564 7.161,-3.564 v 0 l 3.633,4.454 c -1.635,3.546 -7.266,5.72 -7.266,5.72 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient3164" spreadMethod="pad"
                            gradientTransform="matrix(1.0375243,18.408749,18.408749,-1.0375243,217.69489,-325.1959)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3158" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3160" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3162" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3182" clipPathUnits="userSpaceOnUse">
                            <path id="path3180" d="M 64.0791,100.963 H 103.271 V 77.2695 H 64.0791 Z" />
                        </clipPath>
                        <clipPath id="clipPath3198" clipPathUnits="userSpaceOnUse">
                            <path id="path3196" d="m 125.613,85.9502 h 52.46 V 64.9316 h -52.46 z" />
                        </clipPath>
                        <clipPath id="clipPath3270" clipPathUnits="userSpaceOnUse">
                            <path id="path3268"
                                d="m 324.738,124.006 0.367,-1.098 3.323,0.891 -0.122,0.435 c 1.1,1.28 1.878,3.294 1.511,4.255 v 0 c -0.366,0.962 -0.778,1.51 -0.778,1.51 v 0 c -0.092,-3.888 -4.301,-5.993 -4.301,-5.993" />
                        </clipPath>
                        <linearGradient id="linearGradient3282" spreadMethod="pad"
                            gradientTransform="matrix(5.1699219,0,0,-5.1699219,457.0977,-215.49613)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3276" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3278" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3280" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath3292" clipPathUnits="userSpaceOnUse">
                            <path id="path3290"
                                d="m 330.248,123.768 c -3.834,-2.768 -2.863,-6.845 -2.863,-6.845 v 0 l 12.23,0.341 c 0.629,0.582 0.096,1.066 0.096,1.066 v 0 l -5.24,0.534 6.309,0.583 c 0.29,0.728 -0.097,1.311 -0.097,1.311 v 0 l -6.601,0.049 6.406,1.115 c 0,1.116 -0.873,1.553 -0.873,1.553 v 0 l -6.261,-0.583 6.114,1.456 -0.533,1.019 c -0.108,0.035 -0.266,0.051 -0.464,0.051 v 0 c -2.023,0 -8.223,-1.65 -8.223,-1.65" />
                        </clipPath>
                        <linearGradient id="linearGradient3304" spreadMethod="pad"
                            gradientTransform="matrix(13.612305,0,0,-13.612305,459.63481,-220.77934)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3298" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop3300" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3302" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath3314" clipPathUnits="userSpaceOnUse">
                            <path id="path3312" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath3334" clipPathUnits="userSpaceOnUse">
                            <path id="path3332"
                                d="m 208.758,120.51 2.465,0.558 c 0.092,1.674 3.582,4.094 3.582,4.094 v 0 l -0.558,4.234 -5.536,1.07 c 3.629,-5.351 0.047,-9.956 0.047,-9.956" />
                        </clipPath>
                        <linearGradient id="linearGradient3346" spreadMethod="pad"
                            gradientTransform="matrix(6.09375,0,0,-6.09375,341.07036,-216.46098)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop3340" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop3342" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop3344" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2276" clipPathUnits="userSpaceOnUse">
                            <path id="path2274"
                                d="m 416.999,308.794 c 0,0 -1.343,0.881 -1.714,2.641 v 0 c 0,0 -0.528,-1.087 -0.396,-2.31 v 0 l -3.962,-0.007 c 0,0 -0.695,-5.422 0.557,-7.601 v 0 c 1.252,-2.178 2.595,-4.866 6.627,-6.303 v 0 c 0,0 4.125,1.529 5.332,5.932 v 0 c 1.205,4.404 0.786,7.694 0.786,7.694 v 0 l -3.939,0.046 -0.973,1.855 0.185,-1.808 c 0,0 -1.993,0.047 -2.735,2.502 v 0 c 0,0 0.046,-1.528 0.232,-2.641" />
                        </clipPath>
                        <linearGradient id="linearGradient2288" spreadMethod="pad"
                            gradientTransform="matrix(13.56543,0,0,-13.56543,795.15003,122.88035)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2282" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2284" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2286" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2298" clipPathUnits="userSpaceOnUse">
                            <path id="path2296" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2310" clipPathUnits="userSpaceOnUse">
                            <path id="path2308"
                                d="m 418.148,294.371 c -2.596,0.843 -4.442,3.402 -4.442,3.402 v 0 c -0.13,-1.159 -0.239,-1.4 -0.239,-1.4 v 0 c 1.12,-2.883 5.163,-5.364 5.163,-5.364 v 0 c 2.761,1.321 4.563,5.724 4.563,5.724 v 0 c -0.6,0.44 -0.616,1.912 -0.616,1.912 v 0 c -0.745,-2.513 -4.429,-4.274 -4.429,-4.274" />
                        </clipPath>
                        <linearGradient id="linearGradient2322" spreadMethod="pad"
                            gradientTransform="matrix(9.7255859,0,0,-9.7255859,791.55336,114.38279)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2316" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2318" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2320" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2332" clipPathUnits="userSpaceOnUse">
                            <path id="path2330"
                                d="m 412.808,307.197 c 0,0 0.323,-2.202 2.184,-2.202 v 0 c 1.862,0 2.181,3.027 2.181,3.027 v 0 c -0.531,0.049 -0.998,0.07 -1.409,0.07 v 0 c -2.667,0 -2.956,-0.895 -2.956,-0.895" />
                        </clipPath>
                        <linearGradient id="linearGradient2344" spreadMethod="pad"
                            gradientTransform="matrix(0.3295087,4.3518524,4.3518524,-0.3295087,798.69984,117.83689)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2338" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2340" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2342" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2354" clipPathUnits="userSpaceOnUse">
                            <path id="path2352"
                                d="m 418.544,308.092 c 0.539,-2.416 0.871,-2.684 1.742,-3.097 v 0 c 0.873,-0.413 3.256,1.422 2.109,2.522 v 0 c -0.586,0.563 -1.58,0.701 -2.412,0.701 v 0 c -0.793,0 -1.439,-0.126 -1.439,-0.126" />
                        </clipPath>
                        <linearGradient id="linearGradient2366" spreadMethod="pad"
                            gradientTransform="matrix(0.7443485,4.0911374,4.0911374,-0.7443485,803.52211,118.64939)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2360" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2362" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2364" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2376" clipPathUnits="userSpaceOnUse">
                            <path id="path2374"
                                d="m 417.517,303.019 c 0,0 0.474,-0.83 1.027,-0.949 v 0 c 0.551,-0.119 0.793,0.673 0.793,0.949 v 0 c 0,0.093 -0.202,0.124 -0.472,0.124 v 0 c -0.539,0 -1.348,-0.124 -1.348,-0.124" />
                        </clipPath>
                        <linearGradient id="linearGradient2388" spreadMethod="pad"
                            gradientTransform="matrix(0.1143728,1.5105329,1.5105329,-0.1143728,802.59535,119.30027)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2382" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2384" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2386" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2398" clipPathUnits="userSpaceOnUse">
                            <path id="path2396"
                                d="m 416.424,299.123 c -0.053,-0.058 -0.082,-0.092 -0.082,-0.092 v 0 l 4.28,-0.183 c -0.444,0.734 -1.207,1.285 -2.078,1.514 v 0 c -0.06,0.016 -0.122,0.023 -0.185,0.023 v 0 c -0.726,0 -1.656,-0.957 -1.935,-1.262" />
                        </clipPath>
                        <linearGradient id="linearGradient2410" spreadMethod="pad"
                            gradientTransform="matrix(0.1552527,2.0504367,2.0504367,-0.1552527,802.65199,115.25876)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2404" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2406" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2408" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2420" clipPathUnits="userSpaceOnUse">
                            <path id="path2418"
                                d="m 417.763,298.298 c 0.432,-1.652 1.574,-0.23 1.574,-0.23 v 0 c 0,0 -1.137,0.262 -1.479,0.262 v 0 c -0.065,0 -0.101,-0.01 -0.095,-0.032" />
                        </clipPath>
                        <linearGradient id="linearGradient2432" spreadMethod="pad"
                            gradientTransform="matrix(0.0814068,1.0751479,1.0751479,-0.0814068,802.78675,115.38816)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2426" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2428" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2430" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2442" clipPathUnits="userSpaceOnUse">
                            <path id="path2440" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2458" clipPathUnits="userSpaceOnUse">
                            <path id="path2456"
                                d="m 408.993,304.995 c -0.767,-0.522 0.679,-3.413 2.169,-3.686 v 0 c 0,0 -0.895,2.574 -0.813,3.436 v 0 c 0,0 -0.328,0.43 -0.814,0.43 v 0 c -0.165,0 -0.347,-0.049 -0.542,-0.18" />
                        </clipPath>
                        <linearGradient id="linearGradient2470" spreadMethod="pad"
                            gradientTransform="matrix(2.3818359,0,0,-2.3818359,789.26429,122.79783)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2464" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2466" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2468" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2480" clipPathUnits="userSpaceOnUse">
                            <path id="path2478"
                                d="m 424.492,305.393 c 0,0 -0.385,-2.814 -0.577,-3.561 v 0 c 0,0 3.034,3.587 0.919,3.587 v 0 c -0.102,0 -0.215,-0.008 -0.342,-0.026" />
                        </clipPath>
                        <linearGradient id="linearGradient2492" spreadMethod="pad"
                            gradientTransform="matrix(1.6679687,0,0,-1.6679687,805.57777,123.18113)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2486" offset="0" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2488" offset="0.52193825" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2490" offset="1" style="stop-opacity:1;stop-color:#c2886c" />
                        </linearGradient>
                        <clipPath id="clipPath2502" clipPathUnits="userSpaceOnUse">
                            <path id="path2500" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2514" clipPathUnits="userSpaceOnUse">
                            <path id="path2512"
                                d="m 422.447,293.701 c -1.675,-2.544 -3.618,-3.942 -3.618,-3.942 v 0 c -1.866,0.677 -3.487,2.484 -4.613,4.054 v 0 c -1.031,1.443 -1.643,2.687 -1.643,2.687 v 0 c -3.897,0.082 -5.886,-1.017 -5.886,-1.017 v 0 c 0.852,-0.718 1.584,-1.609 2.214,-2.594 v 0 c 3.071,-4.804 3.672,-11.821 3.672,-11.821 v 0 c 6.823,5.928 12.888,2.358 12.888,2.358 v 0 c 0.504,4.776 1.528,7.638 2.415,9.303 v 0 c 0.861,1.616 1.592,2.097 1.592,2.097 v 0 c -2.114,1.332 -5.553,1.679 -5.553,1.679 v 0 c -0.412,-1.049 -0.927,-1.987 -1.468,-2.804" />
                        </clipPath>
                        <linearGradient id="linearGradient2526" spreadMethod="pad"
                            gradientTransform="matrix(22.782227,0,0,-22.782227,791.10218,108.34226)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2520" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2522" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2524" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2536" clipPathUnits="userSpaceOnUse">
                            <path id="path2534"
                                d="m 403.956,292.785 4.75,-17.469 c -3.28,-7.067 5.595,-20.973 5.595,-20.973 v 0 l -1.299,-6.729 3.166,-4.353 3.28,1.017 c 0,0 -1.188,0.398 -1.584,1.132 v 0 c -0.396,0.735 -0.509,3.787 -0.509,3.787 v 0 c 0.283,-0.226 1.018,-1.753 1.018,-2.881 v 0 c 0,-1.133 0.734,-1.471 0.734,-1.471 v 0 l 0.961,2.488 -1.243,5.539 -2.318,1.753 -2.43,10.572 c -2.546,1.584 -4.071,4.749 -4.185,8.706 v 0 c -0.112,3.958 2.262,6.333 2.262,6.333 v 0 c 0,0 -1.978,8.31 -2.997,11.136 v 0 c -1.016,2.827 -3.222,3.842 -3.222,3.842 v 0 c -2.097,-0.773 -1.979,-2.429 -1.979,-2.429" />
                        </clipPath>
                        <linearGradient id="linearGradient2548" spreadMethod="pad"
                            gradientTransform="matrix(-2.6442051,52.336567,52.336567,2.6442051,797.70375,64.347631)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2542" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2544" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2546" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2558" clipPathUnits="userSpaceOnUse">
                            <path id="path2556"
                                d="m 426.112,283.482 c 0,0 2.889,-2.202 3.991,-4.128 v 0 c 0,0 3.44,10.801 2.682,12.728 v 0 c -0.757,1.926 -2.682,2.745 -2.682,2.745 v 0 c 0,0 -3.853,-5.497 -3.991,-11.345" />
                        </clipPath>
                        <linearGradient id="linearGradient2570" spreadMethod="pad"
                            gradientTransform="matrix(14.71636,57.264984,57.264984,-14.71636,802.16273,61.121071)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2564" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2566" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2568" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2580" clipPathUnits="userSpaceOnUse">
                            <path id="path2578"
                                d="m 421.57,262.634 -0.964,-6.881 -1.925,-1.927 0.824,-0.757 1.034,-5.366 -0.471,-3.097 2.878,3.58 -0.825,5.435 4.748,10.87 c 0,0 -1.927,-1.651 -5.299,-1.857" />
                        </clipPath>
                        <linearGradient id="linearGradient2592" spreadMethod="pad"
                            gradientTransform="matrix(14.718006,57.271393,57.271393,-14.718006,802.76332,60.961891)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2586" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2588" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2590" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2602" clipPathUnits="userSpaceOnUse">
                            <path id="path2600"
                                d="m 427.557,264.973 c -0.551,-3.096 -3.097,-7.638 -3.097,-7.638 v 0 c 3.8,1.209 6.825,4.027 6.825,4.027 v 0 c -1.225,0.449 -2.559,4.643 -2.559,4.643 v 0 c -0.343,-0.483 -1.169,-1.032 -1.169,-1.032" />
                        </clipPath>
                        <linearGradient id="linearGradient2614" spreadMethod="pad"
                            gradientTransform="matrix(6.8251953,0,0,-6.8251953,808.87562,81.225561)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2608" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2610" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2612" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2624" clipPathUnits="userSpaceOnUse">
                            <path id="path2622"
                                d="m 405.952,259.331 c 3.165,-1.377 6.398,-1.996 6.398,-1.996 v 0 c -1.927,1.446 -2.684,4.955 -2.684,4.955 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2636" spreadMethod="pad"
                            gradientTransform="matrix(6.3984375,0,0,-6.3984375,790.36781,79.368141)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2630" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2632" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2634" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2646" clipPathUnits="userSpaceOnUse">
                            <path id="path2644"
                                d="m 412.35,248.324 1.308,5.778 -1.308,2.408 -7.018,2.064 c 0,0 6.399,-3.233 7.018,-10.25" />
                        </clipPath>
                        <linearGradient id="linearGradient2656" spreadMethod="pad"
                            gradientTransform="matrix(8.3261719,0,0,-8.3261719,789.74769,73.004861)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2652" offset="0" style="stop-opacity:1;stop-color:#ec1c24" />
                            <stop id="stop2654" offset="1" style="stop-opacity:1;stop-color:#be1e2d" />
                        </linearGradient>
                        <clipPath id="clipPath2666" clipPathUnits="userSpaceOnUse">
                            <path id="path2664"
                                d="m 423.978,256.441 -0.894,-2.994 0.55,-4.505 c 1.514,3.853 10.321,8.806 10.321,8.806 v 0 l -2.888,2.683 c -1.24,-1.513 -7.089,-3.99 -7.089,-3.99" />
                        </clipPath>
                        <linearGradient id="linearGradient2676" spreadMethod="pad"
                            gradientTransform="matrix(10.871094,0,0,-10.871094,807.49964,74.242161)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2672" offset="0" style="stop-opacity:1;stop-color:#ec1c24" />
                            <stop id="stop2674" offset="1" style="stop-opacity:1;stop-color:#be1e2d" />
                        </linearGradient>
                        <clipPath id="clipPath2686" clipPathUnits="userSpaceOnUse">
                            <path id="path2684"
                                d="m 416.677,256.674 c 1.749,-0.651 3.391,-0.35 3.391,-0.35 v 0 l 0.942,6.195 c -3.712,-0.15 -6.432,1.972 -6.432,1.972 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2698" spreadMethod="pad"
                            gradientTransform="matrix(6.4316406,0,0,-6.4316406,798.99378,79.927711)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2692" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2694" offset="0.52193825" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop2696" offset="1" style="stop-opacity:1;stop-color:#2b388f" />
                        </linearGradient>
                        <clipPath id="clipPath2708" clipPathUnits="userSpaceOnUse">
                            <path id="path2706"
                                d="m 416.976,254.687 1.098,-0.762 1.994,1.949 c -1.053,-0.4 -3.441,0.381 -3.441,0.381 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2718" spreadMethod="pad"
                            gradientTransform="matrix(3.4404297,0,0,-3.4404297,801.04261,74.645481)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2714" offset="0" style="stop-opacity:1;stop-color:#ec1c24" />
                            <stop id="stop2716" offset="1" style="stop-opacity:1;stop-color:#be1e2d" />
                        </linearGradient>
                        <clipPath id="clipPath2728" clipPathUnits="userSpaceOnUse">
                            <path id="path2726" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2752" clipPathUnits="userSpaceOnUse">
                            <path id="path2750"
                                d="m 396.958,253.449 c 0,0 3.288,-3.028 4.896,-6.916 v 0 c 0.279,-0.675 0.508,-1.377 0.66,-2.095 v 0 l 9.498,3.724 c 0,0 -0.193,0.873 -0.617,2.082 v 0 c -0.382,1.084 -0.949,2.44 -1.729,3.682 v 0 c -1.254,2.001 -3.109,3.52 -5.344,4.236 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient2764" spreadMethod="pad"
                            gradientTransform="matrix(-8.5679235,12.10579,12.10579,8.5679235,793.09632,65.092751)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2758" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2760" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2762" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2774" clipPathUnits="userSpaceOnUse">
                            <path id="path2772" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2806" clipPathUnits="userSpaceOnUse">
                            <path id="path2804"
                                d="m 425.303,249.976 c -0.3,-0.341 -0.583,-0.684 -0.843,-1.034 v 0 c 0,0 12.89,-11.743 13.21,-12.454 v 0 c 0,0 0.571,0.797 1.542,1.773 v 0 c 1.51,1.516 4.005,3.456 6.853,3.456 v 0 c 0,0 -8.187,13.141 -11.766,15.206 v 0 c 0,0 -5.625,-3.131 -8.996,-6.947" />
                        </clipPath>
                        <linearGradient id="linearGradient2818" spreadMethod="pad"
                            gradientTransform="matrix(21.605469,0,0,-21.605469,808.87562,66.260721)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2812" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2814" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2816" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2828" clipPathUnits="userSpaceOnUse">
                            <path id="path2826" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath2844" clipPathUnits="userSpaceOnUse">
                            <path id="path2842"
                                d="m 401.854,246.533 c 0.279,-0.675 0.508,-1.377 0.66,-2.095 v 0 l 9.498,3.724 c 0,0 -0.193,0.873 -0.617,2.082 v 0 c -2.598,-0.8 -6.167,-2.043 -9.541,-3.711" />
                        </clipPath>
                        <linearGradient id="linearGradient2856" spreadMethod="pad"
                            gradientTransform="matrix(2.300211,-4.6343131,-4.6343131,-2.300211,795.23402,59.112281)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2850" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2852" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2854" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2866" clipPathUnits="userSpaceOnUse">
                            <path id="path2864"
                                d="m 424.46,248.942 c 0,0 12.89,-11.743 13.21,-12.454 v 0 c 0,0 0.571,0.797 1.542,1.773 v 0 c -4.522,4.276 -10.555,9.098 -13.909,11.715 v 0 c -0.3,-0.341 -0.583,-0.684 -0.843,-1.034" />
                        </clipPath>
                        <linearGradient id="linearGradient2878" spreadMethod="pad"
                            gradientTransform="matrix(-10.787447,-10.066003,-10.066003,10.787447,812.14613,59.281231)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop2872" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop2874" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop2876" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath2904" clipPathUnits="userSpaceOnUse">
                            <path id="path2902" d="m 406.687,296.504 h 7.529 v -3.615 h -7.529 z" />
                        </clipPath>
                        <clipPath id="clipPath2920" clipPathUnits="userSpaceOnUse">
                            <path id="path2918" d="m 422.446,296.505 h 7.023 v -3.776 h -7.023 z" />
                        </clipPath>
                        <clipPath id="clipPath618" clipPathUnits="userSpaceOnUse">
                            <path id="path616"
                                d="m 266.233,478.866 c -5.447,-0.637 -9.668,-5.265 -9.668,-10.878 v 0 c 0,-1.683 0.376,-3.277 1.059,-4.703 v 0 c 0.973,-2.044 2.562,-3.737 4.524,-4.845 v 0 c 1.587,-0.893 3.422,-1.404 5.372,-1.404 v 0 c 4.137,0 7.74,2.295 9.603,5.686 v 0 c 0.054,0.1 0.11,0.199 0.162,0.301 v 0 c 0.758,1.489 1.186,3.18 1.186,4.965 v 0 c 0,1.185 -0.187,2.323 -0.537,3.391 v 0 c -0.555,1.72 -1.528,3.247 -2.799,4.474 v 0 c -1.283,1.245 -2.871,2.177 -4.643,2.677 v 0 c -0.946,0.268 -1.942,0.409 -2.972,0.409 v 0 c -0.436,0 -0.867,-0.024 -1.287,-0.073" />
                        </clipPath>
                        <radialGradient id="radialGradient630" spreadMethod="pad"
                            gradientTransform="matrix(10.952393,0,0,-10.952393,460.73804,450.21891)"
                            gradientUnits="userSpaceOnUse" r="1" cy="0" cx="0"
                            fy="0" fx="0">
                            <stop id="stop624" offset="0" style="stop-opacity:1;stop-color:#f1f1f2" />
                            <stop id="stop626" offset="0.45016275" style="stop-opacity:1;stop-color:#f1f1f2" />
                            <stop id="stop628" offset="1" style="stop-opacity:1;stop-color:#d0d2d3" />
                        </radialGradient>
                        <clipPath id="clipPath640" clipPathUnits="userSpaceOnUse">
                            <path id="path638" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath668" clipPathUnits="userSpaceOnUse">
                            <path id="path666"
                                d="m 225.84,452.587 c -6.886,-0.539 -4.254,-6.343 -4.254,-6.343 v 0 c -1.315,-1.314 -0.235,-6.344 -0.235,-6.344 v 0 c 0,0 -1.623,0.619 -3.327,0.619 v 0 c -1.701,0 0.08,-5.805 2.325,-5.959 v 0 c 2.243,-0.153 2.396,2.322 2.396,2.322 v 0 c 5.106,-2.552 13.386,-0.773 13.386,-0.773 v 0 0.054 c 0.006,0.504 0.026,4.495 -0.695,7.607 v 0 c -0.775,3.328 -4.026,5.106 -4.026,5.106 v 0 c -1.702,0.154 -0.772,3.094 -0.772,3.094 v 0 c -0.123,0.097 -0.27,0.179 -0.439,0.252 v 0 c -0.795,0.34 -2.039,0.416 -2.996,0.416 v 0 c -0.777,0 -1.363,-0.051 -1.363,-0.051" />
                        </clipPath>
                        <linearGradient id="linearGradient680" spreadMethod="pad"
                            gradientTransform="matrix(18.784668,0,0,-18.784668,410.5686,425.82633)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop674" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop676" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop678" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath690" clipPathUnits="userSpaceOnUse">
                            <path id="path688" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath702" clipPathUnits="userSpaceOnUse">
                            <path id="path700"
                                d="m 216.371,444.342 c 0.225,-1.124 2.024,-3.263 2.024,-3.263 v 0 l 2.362,-0.392 c -1.18,5.229 0.562,5.847 0.562,5.847 v 0 l -0.562,1.294 z" />
                        </clipPath>
                        <linearGradient id="linearGradient714" spreadMethod="pad"
                            gradientTransform="matrix(3.4988692,-3.4988692,-3.4988692,-3.4988692,410.95972,428.52165)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop708" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop710" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop712" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath724" clipPathUnits="userSpaceOnUse">
                            <path id="path722"
                                d="m 216.089,447.602 c -0.675,-1.18 0,-2.642 0,-2.642 v 0 l 4.612,3.317 c 0,0 -0.056,1.837 0.835,2.893 v 0 c 0,0 -4.772,-2.386 -5.447,-3.568" />
                        </clipPath>
                        <linearGradient id="linearGradient736" spreadMethod="pad"
                            gradientTransform="matrix(1.9752517,-1.9752517,-1.9752517,-1.9752517,410.90308,431.42594)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop730" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop732" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop734" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath746" clipPathUnits="userSpaceOnUse">
                            <path id="path744"
                                d="m 227.167,458.794 c -1.124,-0.394 -9.165,-1.069 -10.74,-9.897 v 0 c 0,0 5.173,3.879 9.447,4.274 v 0 c 4.273,0.393 4.667,3.485 3.487,5.903 v 0 l -0.112,-1.349 c 0,0 -0.508,1.743 -1.069,2.305 v 0 c 0,0 0.111,-0.843 -1.013,-1.236" />
                        </clipPath>
                        <linearGradient id="linearGradient758" spreadMethod="pad"
                            gradientTransform="matrix(2.1558692,-5.1228013,-5.1228013,-2.1558692,414.698,439.59635)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop752" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop754" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop756" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath768" clipPathUnits="userSpaceOnUse">
                            <path id="path766" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath780" clipPathUnits="userSpaceOnUse">
                            <path id="path778"
                                d="m 241.811,441.757 -2.921,-10.488 -12.348,-5.708 -0.096,-0.078 -5.746,-4.702 -3.674,-11.055 c 0.326,0.014 0.973,-0.176 1.783,-0.477 v 0 c 0.569,-0.209 1.216,-0.474 1.888,-0.764 v 0 c 0.738,-0.318 1.506,-0.664 2.221,-0.997 v 0 c 1.768,-0.82 3.235,-1.552 3.235,-1.552 v 0 l 4.999,7.309 2.638,6.046 -1.703,-6.266 c 9.566,-4.232 21.822,-4.89 21.822,-4.89 v 0 c 0,4.901 2.527,9.176 2.686,9.438 v 0 c -1.805,-4.505 -1.862,-9.219 -1.862,-9.219 v 0 c 1.595,0 4.012,0.386 4.012,0.386 v 0 c -0.014,1.368 0.21,2.934 0.56,4.544 v 0 c 1.234,5.628 4.058,11.779 4.058,11.779 v 0 l 0.11,4.505 c -0.413,-0.032 -0.815,-0.061 -1.212,-0.075 v 0 h -0.002 c -9.68,-0.434 -14.998,3.923 -14.998,3.923 v 0 l 7.472,-2.25 c -0.193,0.789 -0.227,1.588 -0.163,2.359 v 0 c 0.241,2.985 1.976,5.552 1.976,5.552 v 0 l -10.827,3.629 -2.306,0.773 z" />
                        </clipPath>
                        <linearGradient id="linearGradient792" spreadMethod="pad"
                            gradientTransform="matrix(46.447266,0,0,-46.447266,410.24683,406.93815)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop786" offset="0" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop788" offset="0.18826557" style="stop-opacity:1;stop-color:#1b75bb" />
                            <stop id="stop790" offset="1" style="stop-opacity:1;stop-color:#0f5184" />
                        </linearGradient>
                        <clipPath id="clipPath802" clipPathUnits="userSpaceOnUse">
                            <path id="path800" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath818" clipPathUnits="userSpaceOnUse">
                            <path id="path816"
                                d="m 229.358,452.181 c -0.32,-0.037 -0.622,-0.152 -0.887,-0.314 v 0 c -0.266,-0.163 -0.495,-0.375 -0.678,-0.618 v 0 c -0.182,-0.244 -0.324,-0.518 -0.384,-0.842 v 0 c 0.311,0.107 0.561,0.244 0.802,0.375 v 0 c 0.238,0.136 0.46,0.272 0.677,0.405 v 0 c 0.218,0.135 0.429,0.267 0.653,0.397 v 0 c 0.226,0.13 0.45,0.265 0.746,0.393 v 0 c -0.211,0.16 -0.472,0.214 -0.727,0.214 v 0 c -0.068,0 -0.136,-0.003 -0.202,-0.01" />
                        </clipPath>
                        <linearGradient id="linearGradient830" spreadMethod="pad"
                            gradientTransform="matrix(2.8769531,0,0,-2.8769531,420.63013,433.52995)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop824" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop826" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop828" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath840" clipPathUnits="userSpaceOnUse">
                            <path id="path838"
                                d="m 223.66,449.788 c -0.422,-0.231 -0.762,-0.586 -0.988,-0.979 v 0 c -0.227,-0.397 -0.358,-0.83 -0.363,-1.279 v 0 c 0.311,0.322 0.578,0.63 0.86,0.898 v 0 c 0.278,0.268 0.566,0.491 0.876,0.663 v 0 c 0.62,0.348 1.348,0.472 2.231,0.488 v 0 c -0.336,0.304 -0.781,0.462 -1.242,0.505 v 0 c -0.065,0.005 -0.131,0.008 -0.196,0.008 v 0 c -0.403,0 -0.818,-0.102 -1.178,-0.304" />
                        </clipPath>
                        <linearGradient id="linearGradient852" spreadMethod="pad"
                            gradientTransform="matrix(3.9672852,0,0,-3.9672852,415.52954,431.04118)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop846" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop848" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop850" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath862" clipPathUnits="userSpaceOnUse">
                            <path id="path860" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath914" clipPathUnits="userSpaceOnUse">
                            <path id="path912"
                                d="m 295.454,402.006 c 0,0 2.302,-0.925 2.735,-3.216 v 0 c 0.094,-0.497 0.099,-1.057 -0.027,-1.686 v 0 c 0,0 5.998,-4.657 16.195,-2.161 v 0 c 0,0 -0.509,0.679 -0.996,1.288 v 0 c -0.343,0.434 -0.67,0.833 -0.798,0.934 v 0 l 0.366,0.669 -0.915,0.823 -0.669,-0.395 c 0,0 -0.883,0.669 -1.886,0.974 v 0 l 0.028,1.154 -0.942,0.277 -0.551,-1.309 c 0,0 -1.215,0.335 -3.682,-0.122 v 0 c 0,0 -1.644,1.37 -2.283,1.765 v 0 l 0.426,0.853 -0.728,0.364 -0.885,-0.425 -0.941,0.852 0.425,0.852 -0.671,0.307 -0.852,-0.367 -0.547,0.427 c 0,0 -1.705,-1.128 -2.802,-1.858" />
                        </clipPath>
                        <linearGradient id="linearGradient926" spreadMethod="pad"
                            gradientTransform="matrix(18.90332,0,0,-18.90332,488.67456,381.26627)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop920" offset="0" style="stop-opacity:1;stop-color:#37b34a" />
                            <stop id="stop922" offset="0.58496294" style="stop-opacity:1;stop-color:#8bc53f" />
                            <stop id="stop924" offset="1" style="stop-opacity:1;stop-color:#8bc53f" />
                        </linearGradient>
                        <clipPath id="clipPath936" clipPathUnits="userSpaceOnUse">
                            <path id="path934" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath948" clipPathUnits="userSpaceOnUse">
                            <path id="path946"
                                d="m 228.333,453.484 c 0.461,0.169 2.582,-0.417 2.582,-0.417 v 0 c 1.209,0.907 0.393,2.992 0.393,2.992 v 0 c 0.331,-1.119 -0.454,-1.723 -0.454,-1.723 v 0 c 0.576,1.451 -0.544,2.993 -0.544,2.993 v 0 c 0.304,-2.517 -1.644,-3.668 -1.977,-3.845 m -0.048,-0.024 c 0,0 0.017,0.008 0.048,0.024 v 0 c -0.019,-0.007 -0.035,-0.015 -0.048,-0.024" />
                        </clipPath>
                        <linearGradient id="linearGradient960" spreadMethod="pad"
                            gradientTransform="matrix(3.2924805,0,0,-3.2924805,421.50513,437.42887)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop954" offset="0" style="stop-opacity:1;stop-color:#7d4921" />
                            <stop id="stop956" offset="0.58496294" style="stop-opacity:1;stop-color:#3b2314" />
                            <stop id="stop958" offset="1" style="stop-opacity:1;stop-color:#3b2314" />
                        </linearGradient>
                        <clipPath id="clipPath970" clipPathUnits="userSpaceOnUse">
                            <path id="path968"
                                d="m 265.225,444.269 -0.447,-3.667 c 0,0 3.668,-4.826 10.573,-4.613 v 0 c 0.867,0.027 1.78,0.13 2.745,0.335 v 0 l -0.613,1.957 c 0,0 1.835,-0.121 3.424,0.245 v 0 c 0,0 -1.891,1.343 -3.406,3.883 v 0 c -1.07,1.793 -1.949,4.184 -1.849,7.114 v 0 c 0,0 -5.298,-5.377 -10.427,-5.254" />
                        </clipPath>
                        <linearGradient id="linearGradient982" spreadMethod="pad"
                            gradientTransform="matrix(16.128906,0,0,-16.128906,457.99878,424.98356)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop976" offset="0" style="stop-opacity:1;stop-color:#c2886c" />
                            <stop id="stop978" offset="0.47806175" style="stop-opacity:1;stop-color:#deb18a" />
                            <stop id="stop980" offset="1" style="stop-opacity:1;stop-color:#deb18a" />
                        </linearGradient>
                        <clipPath id="clipPath992" clipPathUnits="userSpaceOnUse">
                            <path id="path990" d="M 0,500 H 500 V 0 H 0 Z" />
                        </clipPath>
                        <clipPath id="clipPath1024" clipPathUnits="userSpaceOnUse">
                            <path id="path1022"
                                d="m 282.104,475.412 c -0.331,-2.124 4.514,-11.749 4.514,-11.749 v 0 c 2.721,0 4.314,-3.319 4.314,-3.319 v 0 c 0.996,1.927 3.102,1.991 3.36,1.991 v 0 c 0,-0.002 0.002,0 0.002,0 v 0 h 0.024 l 0.067,1.527 -3.916,8.829 c -2.058,2.655 -7.37,6.705 -7.37,6.705 v 0 z" />
                        </clipPath>
                        <linearGradient id="linearGradient1036" spreadMethod="pad"
                            gradientTransform="matrix(11.044437,5.4067655,5.4067655,-11.044437,478.27222,451.13737)"
                            gradientUnits="userSpaceOnUse" y2="0" x2="1" y1="0"
                            x1="0">
                            <stop id="stop1030" offset="0" style="stop-opacity:1;stop-color:#37b34a" />
                            <stop id="stop1032" offset="0.58496294" style="stop-opacity:1;stop-color:#8bc53f" />
                            <stop id="stop1034" offset="1" style="stop-opacity:1;stop-color:#8bc53f" />
                        </linearGradient>
                        <clipPath id="clipPath1102" clipPathUnits="userSpaceOnUse">
                            <path id="path1100" d="m 259.481,416.986 h 6.362 v -18.583 h -6.362 z" />
                        </clipPath>
                        <clipPath id="clipPath1118" clipPathUnits="userSpaceOnUse">
                            <path id="path1116" d="m 263.22,409.214 h 3.671 v -15.263 h -3.671 z" />
                        </clipPath>
                        <clipPath id="clipPath1134" clipPathUnits="userSpaceOnUse">
                            <path id="path1132" d="m 259.545,439.929 h 7.702 v -31.622 h -7.702 z" />
                        </clipPath>
                        <clipPath id="clipPath1150" clipPathUnits="userSpaceOnUse">
                            <path id="path1148" d="m 217.026,443.479 h 28.693 v -34.994 h -28.693 z" />
                        </clipPath>
                        <clipPath id="clipPath1170" clipPathUnits="userSpaceOnUse">
                            <path id="path1168" d="m 256.564,478.94 h 18.572 v -15.655 h -18.572 z" />
                        </clipPath>
                    </defs>
                    <metadata id="metadata6128">
                        <rdf:RDF>
                            <cc:Work rdf:about="">
                                <dc:format>image/svg+xml</dc:format>
                                <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                <dc:title></dc:title>
                            </cc:Work>
                        </rdf:RDF>
                    </metadata>
                    <g transform="translate(-61.684707,-88.848038)" id="layer1">
                        <g id="g13959" transform="matrix(0.35277777,0,0,-0.35277777,-6.4791735,258.96829)">
                            <g id="g612">
                                <g id="g614" clip-path="url(#clipPath618)">
                                    <g id="g620">
                                        <g id="g622">
                                            <path
                                                d="m 266.233,478.866 c -5.447,-0.637 -9.668,-5.265 -9.668,-10.878 v 0 c 0,-1.683 0.376,-3.277 1.059,-4.703 v 0 c 0.973,-2.044 2.562,-3.737 4.524,-4.845 v 0 c 1.587,-0.893 3.422,-1.404 5.372,-1.404 v 0 c 4.137,0 7.74,2.295 9.603,5.686 v 0 c 0.054,0.1 0.11,0.199 0.162,0.301 v 0 c 0.758,1.489 1.186,3.18 1.186,4.965 v 0 c 0,1.185 -0.187,2.323 -0.537,3.391 v 0 c -0.555,1.72 -1.528,3.247 -2.799,4.474 v 0 c -1.283,1.245 -2.871,2.177 -4.643,2.677 v 0 c -0.946,0.268 -1.942,0.409 -2.972,0.409 v 0 c -0.436,0 -0.867,-0.024 -1.287,-0.073"
                                                style="fill:url(#radialGradient630);stroke:none" id="path632" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g634">
                                <g id="g636" clip-path="url(#clipPath640)">
                                    <g id="g642" transform="translate(278.4707,467.9883)">
                                        <path
                                            d="m 0,0 c 0,-1.785 -0.428,-3.476 -1.187,-4.965 -0.05,-0.102 -0.107,-0.201 -0.161,-0.301 -1.862,-3.391 -5.465,-5.686 -9.602,-5.686 -1.95,0 -3.785,0.51 -5.372,1.404 4.278,-0.742 6.102,0.44 6.102,0.44 -1.484,0.073 -2.005,0.89 -2.005,0.89 4.969,0 6.797,3.629 6.907,3.855 l -0.664,-2.072 c 3.346,2.527 3.79,7.061 3.79,7.061 l 0.148,-1.931 c 1.122,1.489 1.453,3.282 1.507,4.696 C -0.187,2.323 0,1.185 0,0"
                                            style="fill:#bbbdbf;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path644" />
                                    </g>
                                    <g id="g646" transform="translate(263.2041,431.3779)">
                                        <path
                                            d="m 0,0 c 0.029,-0.449 0.064,-0.884 0.109,-1.299 l -7.948,1.36 c -0.007,0.637 0.021,1.242 0.074,1.808 0.25,2.775 1.063,4.572 1.063,4.572 l 4.692,-1.55 c 0.598,0.36 1.242,0.606 1.922,0.751 C -0.118,4.067 -0.118,1.919 0,0"
                                            style="fill:#deb18a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path648" />
                                    </g>
                                    <g id="g650" transform="translate(295.5469,429.9043)">
                                        <path
                                            d="m 0,0 c -0.141,-0.847 -0.391,-1.566 -0.695,-2.175 -0.039,-0.085 -0.084,-0.167 -0.13,-0.25 -0.43,-0.783 -0.95,-1.362 -1.429,-1.779 C -2.322,-4.265 -2.389,-4.32 -2.455,-4.374 -3.147,-4.925 -3.7,-5.136 -3.7,-5.136 l -2.442,1.811 0.673,-3.114 -1.556,-0.167 -1.655,3.677 -5.216,2.567 -0.305,0.152 -3.193,0.06 0.249,0.564 1.352,3.053 c 3.709,-0.132 6.2,1.625 6.2,1.625 z"
                                            style="fill:#deb18a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path652" />
                                    </g>
                                    <g id="g654" transform="translate(263.2041,431.3779)">
                                        <path
                                            d="m 0,0 c 0.029,-0.449 0.064,-0.884 0.109,-1.299 l -7.948,1.36 C -7.846,0.698 -7.818,1.303 -7.765,1.869 -6.027,1.33 -3.354,0.603 0,0"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path656" />
                                    </g>
                                    <g id="g658" transform="translate(281.6514,429.5425)">
                                        <path
                                            d="m 0,0 -0.306,0.151 -3.192,0.061 0.249,0.564 c 0.982,0.041 1.978,0.109 2.991,0.199 0,0 0.087,-0.383 0.258,-0.975"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path660" />
                                    </g>
                                </g>
                            </g>
                            <g id="g662">
                                <g id="g664" clip-path="url(#clipPath668)">
                                    <g id="g670">
                                        <g id="g672">
                                            <path
                                                d="m 225.84,452.587 c -6.886,-0.539 -4.254,-6.343 -4.254,-6.343 v 0 c -1.315,-1.314 -0.235,-6.344 -0.235,-6.344 v 0 c 0,0 -1.623,0.619 -3.327,0.619 v 0 c -1.701,0 0.08,-5.805 2.325,-5.959 v 0 c 2.243,-0.153 2.396,2.322 2.396,2.322 v 0 c 5.106,-2.552 13.386,-0.773 13.386,-0.773 v 0 0.054 c 0.006,0.504 0.026,4.495 -0.695,7.607 v 0 c -0.775,3.328 -4.026,5.106 -4.026,5.106 v 0 c -1.702,0.154 -0.772,3.094 -0.772,3.094 v 0 c -0.123,0.097 -0.27,0.179 -0.439,0.252 v 0 c -0.795,0.34 -2.039,0.416 -2.996,0.416 v 0 c -0.777,0 -1.363,-0.051 -1.363,-0.051"
                                                style="fill:url(#linearGradient680);stroke:none" id="path682" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g684">
                                <g id="g686" clip-path="url(#clipPath690)">
                                    <g id="g692" transform="translate(223.6245,435.6255)">
                                        <path
                                            d="M 0,0 C 0,0 7.929,-1.743 12.877,0.281 L 13.046,2.867 14.621,1.911 13.046,-3.15 6.298,-6.748 c 0,0 -4.779,3.655 -6.298,6.748"
                                            style="fill:#ce9d77;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path694" />
                                    </g>
                                </g>
                            </g>
                            <g id="g696">
                                <g id="g698" clip-path="url(#clipPath702)">
                                    <g id="g704">
                                        <g id="g706">
                                            <path
                                                d="m 216.371,444.342 c 0.225,-1.124 2.024,-3.263 2.024,-3.263 v 0 l 2.362,-0.392 c -1.18,5.229 0.562,5.847 0.562,5.847 v 0 l -0.562,1.294 z"
                                                style="fill:url(#linearGradient714);stroke:none" id="path716" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g718">
                                <g id="g720" clip-path="url(#clipPath724)">
                                    <g id="g726">
                                        <g id="g728">
                                            <path
                                                d="m 216.089,447.602 c -0.675,-1.18 0,-2.642 0,-2.642 v 0 l 4.612,3.317 c 0,0 -0.056,1.837 0.835,2.893 v 0 c 0,0 -4.772,-2.386 -5.447,-3.568"
                                                style="fill:url(#linearGradient736);stroke:none" id="path738" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g740">
                                <g id="g742" clip-path="url(#clipPath746)">
                                    <g id="g748">
                                        <g id="g750">
                                            <path
                                                d="m 227.167,458.794 c -1.124,-0.394 -9.165,-1.069 -10.74,-9.897 v 0 c 0,0 5.173,3.879 9.447,4.274 v 0 c 4.273,0.393 4.667,3.485 3.487,5.903 v 0 l -0.112,-1.349 c 0,0 -0.508,1.743 -1.069,2.305 v 0 c 0,0 0.111,-0.843 -1.013,-1.236"
                                                style="fill:url(#linearGradient758);stroke:none" id="path760" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g762">
                                <g id="g764" clip-path="url(#clipPath768)">
                                    <g id="g770" transform="translate(239.627,439.1748)">
                                        <path
                                            d="m 0,0 c 0,0 -2.114,-5.435 -1.963,-6.869 l -8.558,-4.22 -1.803,-1.805 11.192,5.574 2.641,9.508 z"
                                            style="fill:#be1e2d;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path772" />
                                    </g>
                                </g>
                            </g>
                            <g id="g774">
                                <g id="g776" clip-path="url(#clipPath780)">
                                    <g id="g782">
                                        <g id="g784">
                                            <path
                                                d="m 241.811,441.757 -2.921,-10.488 -12.348,-5.708 -0.096,-0.078 -5.746,-4.702 -3.674,-11.055 c 0.326,0.014 0.973,-0.176 1.783,-0.477 v 0 c 0.569,-0.209 1.216,-0.474 1.888,-0.764 v 0 c 0.738,-0.318 1.506,-0.664 2.221,-0.997 v 0 c 1.768,-0.82 3.235,-1.552 3.235,-1.552 v 0 l 4.999,7.309 2.638,6.046 -1.703,-6.266 c 9.566,-4.232 21.822,-4.89 21.822,-4.89 v 0 c 0,4.901 2.527,9.176 2.686,9.438 v 0 c -1.805,-4.505 -1.862,-9.219 -1.862,-9.219 v 0 c 1.595,0 4.012,0.386 4.012,0.386 v 0 c -0.014,1.368 0.21,2.934 0.56,4.544 v 0 c 1.234,5.628 4.058,11.779 4.058,11.779 v 0 l 0.11,4.505 c -0.413,-0.032 -0.815,-0.061 -1.212,-0.075 v 0 h -0.002 c -9.68,-0.434 -14.998,3.923 -14.998,3.923 v 0 l 7.472,-2.25 c -0.193,0.789 -0.227,1.588 -0.163,2.359 v 0 c 0.241,2.985 1.976,5.552 1.976,5.552 v 0 l -10.827,3.629 -2.306,0.773 z"
                                                style="fill:url(#linearGradient792);stroke:none" id="path794" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g796">
                                <g id="g798" clip-path="url(#clipPath802)">
                                    <g id="g804" transform="translate(236.1313,436.1621)">
                                        <path
                                            d="m 0,0 c -0.51,2.321 -2.534,3.975 -2.534,3.975 v 1.076 c -2.485,-0.804 -4.235,0.876 -4.235,0.876 3.564,-0.741 4.103,0.671 4.103,0.671 l -2.555,1.748 c 1.814,0.404 0.334,3.024 0.334,3.024 0,0 -3.09,-2.016 -3.966,1.211 -0.592,2.19 1.511,3.112 2.921,3.479 0.169,-0.073 0.316,-0.155 0.438,-0.252 0,0 -0.929,-2.94 0.772,-3.094 0,0 3.251,-1.779 4.026,-5.106 C 0.026,4.496 0.005,0.505 0,0"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path806" />
                                    </g>
                                    <g id="g808" transform="translate(226.0796,449.5684)">
                                        <path
                                            d="M 0,0 C 0,0 0.653,-2.08 0.594,-3.149 0.535,-4.218 -1.188,-5.108 -2.257,-5.05 -3.327,-4.99 -4.396,-2.436 -3.386,-1.069 -2.375,0.296 0,0 0,0"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path810" />
                                    </g>
                                </g>
                            </g>
                            <g id="g812">
                                <g id="g814" clip-path="url(#clipPath818)">
                                    <g id="g820">
                                        <g id="g822">
                                            <path
                                                d="m 229.358,452.181 c -0.32,-0.037 -0.622,-0.152 -0.887,-0.314 v 0 c -0.266,-0.163 -0.495,-0.375 -0.678,-0.618 v 0 c -0.182,-0.244 -0.324,-0.518 -0.384,-0.842 v 0 c 0.311,0.107 0.561,0.244 0.802,0.375 v 0 c 0.238,0.136 0.46,0.272 0.677,0.405 v 0 c 0.218,0.135 0.429,0.267 0.653,0.397 v 0 c 0.226,0.13 0.45,0.265 0.746,0.393 v 0 c -0.211,0.16 -0.472,0.214 -0.727,0.214 v 0 c -0.068,0 -0.136,-0.003 -0.202,-0.01"
                                                style="fill:url(#linearGradient830);stroke:none" id="path832" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g834">
                                <g id="g836" clip-path="url(#clipPath840)">
                                    <g id="g842">
                                        <g id="g844">
                                            <path
                                                d="m 223.66,449.788 c -0.422,-0.231 -0.762,-0.586 -0.988,-0.979 v 0 c -0.227,-0.397 -0.358,-0.83 -0.363,-1.279 v 0 c 0.311,0.322 0.578,0.63 0.86,0.898 v 0 c 0.278,0.268 0.566,0.491 0.876,0.663 v 0 c 0.62,0.348 1.348,0.472 2.231,0.488 v 0 c -0.336,0.304 -0.781,0.462 -1.242,0.505 v 0 c -0.065,0.005 -0.131,0.008 -0.196,0.008 v 0 c -0.403,0 -0.818,-0.102 -1.178,-0.304"
                                                style="fill:url(#linearGradient852);stroke:none" id="path854" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g856">
                                <g id="g858" clip-path="url(#clipPath862)">
                                    <g id="g864" transform="translate(259.3057,413.2852)">
                                        <path
                                            d="m 0,0 c -0.351,-1.609 -0.574,-3.176 -0.561,-4.546 0,0 -2.418,-0.385 -4.011,-0.385 0,0 0.056,4.724 1.866,9.23 -0.079,-0.136 -2.692,-4.472 -2.692,-9.45 0,0 -12.256,0.658 -21.82,4.891 l 1.704,6.265 -2.639,-6.046 -5,-7.31 c 0,0 -1.466,0.733 -3.234,1.554 l 7.076,12.496 6.24,2.522 -1.726,-6.771 3.585,6.506 -1.062,-6.373 c 0,0 7.567,-3.318 14.868,-2.788 0,0 2.388,5.045 5.045,7.569 l -0.132,-7.569 z"
                                            style="fill:#145b93;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path866" />
                                    </g>
                                    <g id="g868" transform="translate(210.0801,386.6606)">
                                        <path
                                            d="m 0,0 c 0,0 -2.124,-4.646 -0.796,-6.505 0,0 -0.435,-0.099 -0.932,-0.08 -0.446,0.016 -0.938,0.127 -1.203,0.491 l -0.63,4.187 c 0,0 -4.604,-4.114 -4.673,-8.372 l -1.393,0.489 c 0,0 -0.908,2.092 0.557,5.65 l -3.42,-4.535 -1.535,0.837 4.116,6.069 7.605,4.884 6.139,15.839 3.419,0.905 0.433,1.73 0.147,0.582 5.708,-2.654 L -0.531,1.859 Z"
                                            style="fill:#deb18a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path870" />
                                    </g>
                                    <g id="g872" transform="translate(276.7412,403.0078)">
                                        <path
                                            d="m 0,0 c 0,0 -1.298,-0.726 -3.025,-1.836 -3.038,-1.944 -7.41,-5.07 -8.481,-7.511 l -0.127,0.29 -1.888,4.248 -0.093,0.204 -3.645,8.205 c 0,0 -0.006,0.219 0.011,0.618 0.007,0.276 0.023,0.641 0.052,1.081 0.202,3.032 1.043,9.638 4.491,15.918 0,0 -0.12,12.705 0.36,15.704 0,0 0.66,-1.248 2.359,-2.461 1.658,-1.182 4.304,-2.327 8.294,-2.256 1.328,0.021 2.807,0.18 4.447,0.52 C 2.755,32.724 -5.513,18.579 0,0"
                                            style="fill:#be1e2d;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path874" />
                                    </g>
                                    <g id="g876" transform="translate(205.042,382.8555)">
                                        <path d="m 0,0 -1.106,-1.499 1.427,-1.035 1.105,1.356 z"
                                            style="fill:#c2886c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path878" />
                                    </g>
                                    <g id="g880" transform="translate(203.5444,380.8931)">
                                        <path
                                            d="m 0,0 c 0,0 -0.928,-1.748 -0.928,-1.89 0,-0.143 0.428,-1.213 0.428,-1.213 0,0 0.999,0.178 1.712,0.82 z"
                                            style="fill:#c2886c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path882" />
                                    </g>
                                    <g id="g884" transform="translate(210.0801,386.6606)">
                                        <path
                                            d="m 0,0 c 0,0 -2.124,-4.646 -0.796,-6.505 0,0 -0.435,-0.099 -0.932,-0.08 -0.771,2.27 0.013,4.256 0.446,5.478 0.531,1.505 0,2.746 0,2.746 l 11.77,17.434 -2.801,2.516 0.147,0.582 5.708,-2.654 L -0.531,1.859 Z"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path886" />
                                    </g>
                                    <g id="g888" transform="translate(290.1299,430.231)">
                                        <path
                                            d="M 0,0 C -0.126,-0.192 -0.445,-0.656 -0.822,-1.173 -0.397,-1.418 1.793,-2.738 3.163,-4.531 3.095,-4.591 3.028,-4.646 2.962,-4.701 1.588,-2.897 -0.649,-1.58 -0.981,-1.389 -1.326,-1.851 -1.704,-2.33 -2.024,-2.664 L -2.22,-2.48 c 0.701,0.732 1.712,2.203 1.988,2.607 C -0.508,0.27 -0.883,0.43 -1.374,0.571 -2.719,0.952 -4.02,0.251 -4.029,0.243 l -0.077,-0.039 -2.555,1.933 0.16,0.213 2.42,-1.832 c 0.314,0.153 1.508,0.668 2.778,0.307 1.1,-0.313 1.648,-0.709 1.848,-0.889 L 1.724,1.004 -2.14,2.999 -2.018,3.236 2.186,1.064 1.036,0.024 C 1.633,-0.26 3.399,-1.161 4.722,-2.502 4.683,-2.586 4.638,-2.669 4.592,-2.751 3.216,-1.333 1.276,-0.38 0.823,-0.17 l -0.292,-0.263 -0.086,0.1 C 0.442,-0.33 0.312,-0.189 0,0"
                                            style="fill:#c2886c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path890" />
                                    </g>
                                    <g id="g892" transform="translate(262.2559,429.4922)">
                                        <path
                                            d="m 0,0 c -4.923,-0.467 -14.373,-0.523 -18.035,5.263 l -0.1,0.302 -0.407,1.719 c 0,0 7.305,-2.176 10.855,-3.253 -0.063,-0.77 -0.028,-1.57 0.165,-2.358 l -7.476,2.252 c 0,0 5.323,-4.36 14.998,-3.925"
                                            style="fill:#145b93;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path894" />
                                    </g>
                                    <g id="g896" transform="translate(220.9302,438.6797)">
                                        <path
                                            d="m 0,0 c 0,0 -1.703,0.831 -2.217,0.594 -0.514,-0.238 0.554,-3.603 1.504,-3.445 0.951,0.159 1.109,1.584 1.109,1.584 0,0 -2.613,0.198 -0.396,1.267"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path898" />
                                    </g>
                                    <g id="g900" transform="translate(283.4805,393.2798)">
                                        <path
                                            d="m 0,0 c 0,0 -9.073,-4.368 -11.091,-6.587 0,0 -5.177,5.445 -5.983,7.461 0,0 5.108,5.513 9.41,7.127 L -7.596,7.57 -7.26,5.446 c 0,0 1.347,3.227 3.43,4.371 0,0 3.253,-2.542 3.794,-7.451 C 0.044,1.631 0.062,0.842 0,0"
                                            style="fill:#deb18a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path902" />
                                    </g>
                                    <g id="g904" transform="translate(284.4941,393.4165)">
                                        <path
                                            d="M 0,0 C 0.07,0.922 0.05,1.775 -0.04,2.559 -0.62,7.639 -4.099,9.863 -4.099,9.863 0.109,10.294 10.888,8.031 10.888,8.031 11.677,7.835 12.426,6.435 12.891,5.374 13.188,4.691 13.369,4.15 13.369,4.15 Z"
                                            style="fill:#e6e7e8;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path906" />
                                    </g>
                                </g>
                            </g>
                            <g id="g908">
                                <g id="g910" clip-path="url(#clipPath914)">
                                    <g id="g916">
                                        <g id="g918">
                                            <path
                                                d="m 295.454,402.006 c 0,0 2.302,-0.925 2.735,-3.216 v 0 c 0.094,-0.497 0.099,-1.057 -0.027,-1.686 v 0 c 0,0 5.998,-4.657 16.195,-2.161 v 0 c 0,0 -0.509,0.679 -0.996,1.288 v 0 c -0.343,0.434 -0.67,0.833 -0.798,0.934 v 0 l 0.366,0.669 -0.915,0.823 -0.669,-0.395 c 0,0 -0.883,0.669 -1.886,0.974 v 0 l 0.028,1.154 -0.942,0.277 -0.551,-1.309 c 0,0 -1.215,0.335 -3.682,-0.122 v 0 c 0,0 -1.644,1.37 -2.283,1.765 v 0 l 0.426,0.853 -0.728,0.364 -0.885,-0.425 -0.941,0.852 0.425,0.852 -0.671,0.307 -0.852,-0.367 -0.547,0.427 c 0,0 -1.705,-1.128 -2.802,-1.858"
                                                style="fill:url(#linearGradient926);stroke:none" id="path928" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g930">
                                <g id="g932" clip-path="url(#clipPath936)">
                                    <g id="g938" transform="translate(283.4805,393.2798)">
                                        <path
                                            d="m 0,0 c 0,0 -9.073,-4.368 -11.091,-6.587 0,0 -5.177,5.445 -5.983,7.461 0,0 5.108,5.513 9.41,7.127 L -7.596,7.57 c -2.315,-2.179 -7.121,-6.746 -7.786,-7.684 l 3.895,-2.833 c 0,0 5.93,3.502 11.451,5.313 C 0.044,1.631 0.062,0.842 0,0"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path940" />
                                    </g>
                                </g>
                            </g>
                            <g id="g942">
                                <g id="g944" clip-path="url(#clipPath948)">
                                    <g id="g950">
                                        <g id="g952">
                                            <path
                                                d="m 228.333,453.484 c 0.461,0.169 2.582,-0.417 2.582,-0.417 v 0 c 1.209,0.907 0.393,2.992 0.393,2.992 v 0 c 0.331,-1.119 -0.454,-1.723 -0.454,-1.723 v 0 c 0.576,1.451 -0.544,2.993 -0.544,2.993 v 0 c 0.304,-2.517 -1.644,-3.668 -1.977,-3.845 m -0.048,-0.024 c 0,0 0.017,0.008 0.048,0.024 v 0 c -0.019,-0.007 -0.035,-0.015 -0.048,-0.024"
                                                style="fill:url(#linearGradient960);stroke:none" id="path962" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g964">
                                <g id="g966" clip-path="url(#clipPath970)">
                                    <g id="g972">
                                        <g id="g974">
                                            <path
                                                d="m 265.225,444.269 -0.447,-3.667 c 0,0 3.668,-4.826 10.573,-4.613 v 0 c 0.867,0.027 1.78,0.13 2.745,0.335 v 0 l -0.613,1.957 c 0,0 1.835,-0.121 3.424,0.245 v 0 c 0,0 -1.891,1.343 -3.406,3.883 v 0 c -1.07,1.793 -1.949,4.184 -1.849,7.114 v 0 c 0,0 -5.298,-5.377 -10.427,-5.254"
                                                style="fill:url(#linearGradient982);stroke:none" id="path984" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g986">
                                <g id="g988" clip-path="url(#clipPath992)">
                                    <g id="g994" transform="translate(297.3848,398.79)">
                                        <path
                                            d="m 0,0 c 0.297,-0.682 0.479,-1.224 0.479,-1.224 l -13.37,-4.15 c 0.071,0.923 0.05,1.775 -0.04,2.559 C -11.012,-2.228 -3.943,-0.152 0,0"
                                            style="fill:#d0d2d3;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path996" />
                                    </g>
                                    <g id="g998" transform="translate(314.3574,394.9429)">
                                        <path
                                            d="m 0,0 c -10.197,-2.496 -16.195,2.162 -16.195,2.162 0.126,0.629 0.12,1.188 0.026,1.685 0.055,-0.003 0.107,-0.006 0.157,-0.007 0,0 5.408,-2.94 15.016,-2.552 C -0.51,0.679 0,0 0,0"
                                            style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path1000" />
                                    </g>
                                    <g id="g1002" transform="translate(290.4482,460.3354)">
                                        <path
                                            d="m 0,0 c -1.621,-21.329 -8.107,-21.829 -8.107,-21.829 -1.939,1.091 -3.251,2.683 -4.135,4.33 -1.851,3.442 -1.851,7.146 -1.851,7.146 8.107,7.735 10.6,13.099 10.6,13.099 C -2.229,2.303 -1.351,1.606 -0.79,1.025 -0.243,0.457 0,0 0,0"
                                            style="fill:#e6e7e8;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path1004" />
                                    </g>
                                    <g id="g1006" transform="translate(279.4961,435.7314)">
                                        <path
                                            d="m 0,0 c 0,0 -8.269,-14.144 -2.757,-32.723 0,0 -1.295,-0.727 -3.022,-1.837 -0.861,1.718 -7.491,16.056 1.333,34.04 C -3.119,-0.499 -1.64,-0.338 0,0"
                                            style="fill:#b01b28;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path1008" />
                                    </g>
                                    <g id="g1010" transform="translate(280.9072,438.5259)">
                                        <path
                                            d="m 0,0 c -1.59,-0.367 -3.425,-0.245 -3.425,-0.245 l 0.614,-1.957 C -3.776,-2.406 -4.689,-2.51 -5.556,-2.537 l -2.74,4.308 c 0,0 2.123,0.486 4.891,2.113 C -1.891,1.343 0,0 0,0"
                                            style="fill:#b98768;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path1012" />
                                    </g>
                                    <g id="g1014" transform="translate(290.4482,460.3354)">
                                        <path
                                            d="m 0,0 c -1.621,-21.329 -8.107,-21.829 -8.107,-21.829 -1.939,1.091 -3.251,2.683 -4.135,4.33 4.305,2.739 9.791,8.171 11.452,18.524 C -0.243,0.457 0,0 0,0"
                                            style="fill:#d0d2d3;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            id="path1016" />
                                    </g>
                                </g>
                            </g>
                            <g id="g1018">
                                <g id="g1020" clip-path="url(#clipPath1024)">
                                    <g id="g1026">
                                        <g id="g1028">
                                            <path
                                                d="m 282.104,475.412 c -0.331,-2.124 4.514,-11.749 4.514,-11.749 v 0 c 2.721,0 4.314,-3.319 4.314,-3.319 v 0 c 0.996,1.927 3.102,1.991 3.36,1.991 v 0 c 0,-0.002 0.002,0 0.002,0 v 0 h 0.024 l 0.067,1.527 -3.916,8.829 c -2.058,2.655 -7.37,6.705 -7.37,6.705 v 0 z"
                                                style="fill:url(#linearGradient1036);stroke:none" id="path1038" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g1048" transform="translate(294.3848,463.8618)">
                                <path
                                    d="m 0,0 -0.066,-1.526 h -0.025 c 0,0 -0.002,-0.003 -0.002,0 -4.092,1.491 -5.885,7.924 -5.885,7.924 l -2.842,0.91 c -1.111,2.357 -1.966,5.854 -2.465,8.226 0,0 5.311,-4.05 7.369,-6.705 z"
                                    style="fill:#8bc53f;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1050" />
                            </g>
                            <g id="g1052" transform="translate(259.9863,460.8931)">
                                <path
                                    d="M 0,0 C 1.106,0.299 2.22,0.554 3.334,0.796 L 3.167,0.672 4.045,2.538 4.948,4.391 4.933,4.118 4.165,6.12 C 3.922,6.793 3.668,7.461 3.431,8.135 L 3.759,7.92 1.848,7.862 -0.069,7.83 0.1,7.917 C -0.573,7.13 -1.26,6.354 -1.973,5.602 c 0.546,0.882 1.124,1.741 1.716,2.589 l 0.054,0.078 0.112,0.01 1.907,0.166 1.909,0.138 0.234,0.018 0.094,-0.233 c 0.264,-0.663 0.514,-1.333 0.772,-2 L 5.565,4.356 5.617,4.212 5.55,4.084 4.577,2.266 3.581,0.461 3.52,0.349 3.411,0.336 C 2.278,0.202 1.143,0.079 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1054" />
                            </g>
                            <g id="g1056" transform="translate(272.8662,458.8135)">
                                <path
                                    d="m 0,0 c 0.06,0.617 0.134,1.23 0.22,1.843 0.082,0.611 0.174,1.221 0.27,1.83 L 0.543,3.463 C 0.109,3.95 -0.325,4.436 -0.747,4.932 -1.176,5.422 -1.596,5.92 -2.011,6.421 l -0.111,0.136 0.044,0.174 c 0.189,0.751 0.398,1.497 0.604,2.243 0.102,0.374 0.211,0.745 0.321,1.116 l 0.331,1.114 0.049,0.162 0.146,0.039 c 1.49,0.402 2.986,0.781 4.508,1.081 -1.428,-0.603 -2.88,-1.131 -4.339,-1.633 l 0.195,0.201 -0.268,-1.129 C -0.623,9.548 -0.713,9.17 -0.812,8.797 -1.006,8.047 -1.198,7.298 -1.409,6.553 L -1.477,6.861 C -1.064,6.357 -0.658,5.849 -0.258,5.333 0.146,4.823 0.539,4.303 0.934,3.783 L 1.011,3.679 0.985,3.572 C 0.836,2.975 0.683,2.376 0.521,1.782 0.356,1.186 0.186,0.592 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1058" />
                            </g>
                            <g id="g1060" transform="translate(267.5137,478.144)">
                                <path
                                    d="m 0,0 c 0.081,-0.795 0.139,-1.591 0.193,-2.386 0.05,-0.797 0.098,-1.592 0.129,-2.387 L 0.326,-4.892 0.223,-4.984 C -0.392,-5.528 -1.023,-6.052 -1.651,-6.583 -2.289,-7.098 -2.917,-7.627 -3.564,-8.132 L -3.648,-8.199 -3.745,-8.207 C -4.369,-8.268 -4.988,-8.34 -5.612,-8.389 -6.235,-8.44 -6.857,-8.5 -7.481,-8.541 l -0.234,-0.014 -0.06,0.201 c -0.212,0.715 -0.413,1.433 -0.61,2.152 -0.188,0.722 -0.379,1.442 -0.54,2.174 0.312,-0.682 0.589,-1.372 0.872,-2.063 0.275,-0.694 0.545,-1.388 0.803,-2.086 l -0.292,0.187 c 0.619,0.095 1.239,0.17 1.86,0.254 0.618,0.085 1.24,0.148 1.862,0.223 l -0.182,-0.075 c 0.633,0.523 1.285,1.021 1.927,1.532 0.654,0.498 1.303,1.002 1.967,1.486 l -0.099,-0.21 c 0.012,0.796 0.041,1.592 0.071,2.39 C -0.101,-1.594 -0.062,-0.797 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1062" />
                            </g>
                            <g id="g1064" transform="translate(268.2529,478.4849)">
                                <path
                                    d="m 0,0 c 0.155,-0.868 0.276,-1.738 0.388,-2.609 0.115,-0.87 0.21,-1.744 0.301,-2.617 l -0.14,0.234 c 0.635,-0.373 1.265,-0.749 1.888,-1.141 0.628,-0.38 1.239,-0.789 1.857,-1.185 l -0.267,0.04 c 0.682,0.163 1.359,0.336 2.04,0.489 0.683,0.157 1.368,0.307 2.054,0.446 L 7.985,-6.557 c -0.086,0.725 -0.169,1.45 -0.217,2.182 0.217,-0.7 0.403,-1.406 0.585,-2.113 L 8.394,-6.645 8.218,-6.703 C 7.552,-6.923 6.884,-7.134 6.215,-7.337 5.545,-7.545 4.873,-7.733 4.203,-7.931 l -0.14,-0.041 -0.13,0.081 c -0.624,0.39 -1.254,0.767 -1.869,1.171 -0.62,0.395 -1.23,0.803 -1.839,1.216 L 0.092,-5.413 0.086,-5.269 C 0.048,-4.393 0.015,-3.516 -0.002,-2.638 -0.019,-1.76 -0.026,-0.881 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1066" />
                            </g>
                            <g id="g1068" transform="translate(284.293,476.7085)">
                                <path d="M 0,0 1.523,0.718 2.158,-0.381 0.847,-1.269 c 0,0 -0.761,0.254 -0.847,1.269"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1070" />
                            </g>
                            <g id="g1072" transform="translate(286.5342,476.5493)">
                                <path d="M 0,0 1.382,0.653 1.958,-0.346 0.771,-1.152 c 0,0 -0.693,0.231 -0.771,1.152"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1074" />
                            </g>
                            <g id="g1076" transform="translate(286.0264,473.1143)">
                                <path d="M 0,0 1.523,0.719 2.157,-0.38 0.847,-1.268 c 0,0 -0.76,0.254 -0.847,1.268"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1078" />
                            </g>
                            <g id="g1080" transform="translate(288.3096,473.8013)">
                                <path d="M 0,0 1.382,0.653 1.959,-0.346 0.771,-1.152 c 0,0 -0.692,0.23 -0.771,1.152"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1082" />
                            </g>
                            <g id="g1084" transform="translate(291.0586,465.8853)">
                                <path d="M 0,0 1.523,0.718 2.158,-0.381 0.846,-1.27 c 0,0 -0.76,0.255 -0.846,1.27"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1086" />
                            </g>
                            <g id="g1088" transform="translate(293.1299,465.3442)">
                                <path d="M 0,0 1.382,0.653 1.958,-0.345 0.771,-1.151 c 0,0 -0.693,0.23 -0.771,1.151"
                                    style="fill:#37b34a;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1090" />
                            </g>
                            <g id="g1092" transform="translate(266.0234,457.6304)">
                                <path
                                    d="m 0,0 c -0.729,1.026 -1.396,2.084 -2.048,3.152 l -0.067,0.111 0.064,0.14 c 0.29,0.636 0.595,1.264 0.902,1.892 0.301,0.632 0.623,1.251 0.934,1.877 l 0.083,0.167 0.195,0.023 c 0.362,0.04 0.723,0.065 1.083,0.099 L 2.229,7.553 C 2.954,7.604 3.677,7.66 4.401,7.692 L 4.557,7.701 4.634,7.596 C 5.366,6.602 6.084,5.596 6.751,4.551 5.868,5.422 5.037,6.336 4.22,7.261 L 4.452,7.165 C 3.735,7.058 3.015,6.976 2.296,6.887 L 1.213,6.771 C 0.853,6.735 0.494,6.69 0.133,6.662 L 0.411,6.851 C 0.084,6.233 -0.229,5.61 -0.566,4.997 -0.898,4.382 -1.229,3.767 -1.577,3.159 L -1.58,3.41 C -1.021,2.291 -0.482,1.162 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1094" />
                            </g>
                            <g id="g1096">
                                <g id="g1098" />
                                <g id="g1110">
                                    <g clip-path="url(#clipPath1102)" id="g1108">
                                        <g transform="translate(265.8428,416.9858)" id="g1106">
                                            <path
                                                d="m 0,0 -2.716,-18.583 -3.644,8.205 c 0,0 -0.006,0.219 0.01,0.618 z"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                id="path1104" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g1112">
                                <g id="g1114" />
                                <g id="g1126">
                                    <g clip-path="url(#clipPath1118)" id="g1124">
                                        <g transform="translate(263.2197,398.1987)" id="g1122">
                                            <path d="M 0,0 3.671,11.015 1.889,-4.248 Z"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                id="path1120" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g1128">
                                <g id="g1130" />
                                <g id="g1142">
                                    <g clip-path="url(#clipPath1134)" id="g1140">
                                        <g transform="translate(259.5449,408.3071)" id="g1138">
                                            <path
                                                d="m 0,0 c 0.202,3.031 1.043,9.638 4.491,15.917 0,0 -0.12,12.706 0.361,15.705 0,0 0.66,-1.248 2.358,-2.461 L 7.702,16.187 Z"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                id="path1136" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g1144">
                                <g id="g1146" />
                                <g id="g1158">
                                    <g clip-path="url(#clipPath1150)" id="g1156" style="opacity:0.39999402">
                                        <g transform="translate(245.7187,442.7051)" id="g1154">
                                            <path
                                                d="m 0,0 -1.224,-1.185 -6.64,-15.942 1.138,4.176 -12.334,-9.487 -5.961,-11.782 c -0.673,0.29 -1.32,0.555 -1.889,0.763 -0.81,0.302 -1.457,0.493 -1.782,0.478 l 3.673,11.055 5.747,4.702 0.095,0.078 12.348,5.708 2.922,10.488 1.601,1.722 z"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                id="path1152" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                            <g id="g1160" transform="translate(277.2842,463.0234)">
                                <path
                                    d="m 0,0 c -0.051,-0.103 -0.107,-0.201 -0.161,-0.301 -0.32,-0.027 -0.644,-0.067 -0.965,-0.102 -0.607,-0.07 -1.214,-0.148 -1.82,-0.233 0.597,0.142 1.19,0.28 1.793,0.406 C -0.769,-0.152 -0.391,-0.067 0,0"
                                    style="fill:#6d6e70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                    id="path1162" />
                            </g>
                            <g id="g1164">
                                <g id="g1166" />
                                <g id="g1178">
                                    <g clip-path="url(#clipPath1170)" id="g1176" style="opacity:0.5">
                                        <g transform="translate(268.4131,476.6201)" id="g1174">
                                            <path
                                                d="m 0,0 1.706,-0.944 c -4.067,0.187 -5.394,-1.609 -5.394,-1.609 l 2.462,-0.187 c -4.492,-1.1 -7.295,-5.485 -7.468,-5.758 l 1.414,4.053 c -3.037,-2.065 -3.54,-6.199 -3.509,-8.89 -0.683,1.426 -1.06,3.02 -1.06,4.703 0,5.612 4.222,10.241 9.668,10.878 0.421,0.049 0.852,0.074 1.288,0.074 1.03,0 2.026,-0.142 2.972,-0.41 C 3.852,1.411 5.438,0.478 6.723,-0.768 2.589,0.34 0,0 0,0"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                id="path1172" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>

                <h1><span style="color:white">LIGA DEPORTIVA "EL TEJAR"</span></h1>

            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <!--div class="grid grid-cols-1 md:grid-cols2"-->
                <div class="grid grid-cols-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold  text-gray-600">
                                <!--a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a-->
                                NOTICIAS
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead style="background-color:#6777ef">
                                        <th style="color:#fff;">Nro</th>
                                        <th style="color:#fff;">Titulo</th>
                                        <th style="color:#fff;">Contenido</th>
                                        <th style="color:#fff;">Descripción</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($noticias as $not)
                                            <tr>
                                                <td>{{ $not->id }}</td>
                                                <td>{{ $not->titulo }}</td>
                                                <td>{{ $not->contenido }}</td>
                                                <td>{{ $not->descripcion }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('welcome') }}" class="btn btn-default">Volver a la página de inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript"></script>

</html>
